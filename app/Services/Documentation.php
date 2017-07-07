<?php

declare(strict_types=1);

namespace App\Services;

use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use Illuminate\Support\Facades\Storage;
use GrahamCampbell\GitHub\GitHubManager;
use League\CommonMark\Inline\Element\Link;
use Webuni\CommonMark\TableExtension\Table;
use League\CommonMark\Block\Element\Heading;
use Webuni\CommonMark\TableExtension\TableExtension;
use App\Services\Documentation\Markdown\LinkRenderer;
use App\Services\Documentation\Markdown\TableRenderer;
use App\Services\Documentation\Markdown\HeadingRenderer;

class Documentation
{
    /**
     * DIRECTORY.
     */
    private const DIRECTORY = 'docs';

    /**
     * @var GitHubManager
     */
    private $github;

    public function __construct(GitHubManager $github)
    {
        $this->github = $github;
        $this->storage = Storage::disk('local');
    }

    /**
     * Remove all files.
     */
    public function purge(): void
    {
        $this->storage->deleteDirectory(self::DIRECTORY);
    }

    /**
     * Download files.
     *
     * @param string $version
     * @param string|null $path
     */
    public function download(string $version, string $path = null): void
    {
        $items = $this->github
            ->repository()
            ->contents()
            ->show('fondbot', 'docs', $path, $version);

        collect($items)->each(function (array $item) use ($version, $path) {
            // We need to create directory and download its contents
            if ($item['type'] === 'dir') {
                $this->storage->makeDirectory(self::DIRECTORY.'/'.$version.'/'.$item['name']);

                $this->download($version, $item['path']);
            } elseif ($item['type'] === 'file') {
                $this->storage->put(
                    self::DIRECTORY.'/'.$version.'/'.$path.'/'.$item['name'],
                    file_get_contents($item['download_url'])
                );
            }
        });
    }

    /**
     * Compile Markdown to HTML.
     *
     * @param string $version
     */
    public function compile(string $version): void
    {
        $files = $this->storage->files('docs/'.$version, true);

        collect($files)->each(function ($file) use ($version) {
            // Get language of the file
            $language = collect(explode('/', $file))->slice(2, 1)->first();

            // Create markdown parser
            $environment = Environment::createCommonMarkEnvironment();
            $environment->addExtension(new TableExtension);
            $environment->addBlockRenderer(Table::class, new TableRenderer);
            $environment->addBlockRenderer(Heading::class, new HeadingRenderer);
            $environment->addInlineRenderer(Link::class, new LinkRenderer($language, $version));

            $parser = new DocParser($environment);
            $htmlRenderer = new HtmlRenderer($environment);

            // Get file contents
            $markdown = $this->storage->get($file);

            // Compile to html
            $document = $parser->parse($markdown);
            $html = $htmlRenderer->renderBlock($document);

            // Replace file extension to html
            $file = str_replace('.md', '.html', $file);

            // Save result
            $this->storage->put($file, $html);
        });
    }

    /**
     * Get HTML file.
     *
     * @param string $version
     * @param string $language
     * @param string $page
     *
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function get(string $version, string $language, string $page): string
    {
        return Storage::get(self::DIRECTORY.'/'.$version.'/'.$language.'/'.$page.'.html');
    }
}

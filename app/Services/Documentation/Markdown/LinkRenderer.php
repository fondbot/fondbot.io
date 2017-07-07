<?php

declare(strict_types=1);

namespace App\Services\Documentation\Markdown;

use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\LinkRenderer as BaseLinkRenderer;

class LinkRenderer extends BaseLinkRenderer
{
    private $language;
    private $version;

    public function __construct(string $language, string $version)
    {
        $this->language = $language;
        $this->version = $version;
    }

    public function render(
        AbstractInline $inline,
        ElementRendererInterface $htmlRenderer
    ): ?\League\CommonMark\HtmlElement {
        $element = parent::render($inline, $htmlRenderer);

        $href = $element->getAttribute('href');

        // If this is an external link we will force it to open in a new tab
        if (starts_with($href, ['http'])) {
            $element->setAttribute('target', '_blank');

            return $element;
        }

        // Otherwise, we will remove trailing slash and fix URL
        if (starts_with($href, '/')) {
            $href = substr_replace($href, '', 0, 1);
        }

        $element->setAttribute('href', route('docs.show', [$this->language, $this->version, $href]));

        return $element;
    }
}

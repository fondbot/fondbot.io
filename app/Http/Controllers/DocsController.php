<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entities\Language;
use App\Services\Documentation;
use App\Services\Version;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\RedirectResponse;

class DocsController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function index() : RedirectResponse
    {
        return redirect()->route('docs.show', [Language::EN, Version::latest(), 'introduction']);
    }

    /**
     * @param string $language
     * @param string $version
     * @param string $page
     *
     * @return \Illuminate\Contracts\View\Factory|RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show(string $language, string $version, string $page)
    {
        try {
            $contents = Documentation::get($version, $language, $page);

            return view('docs.show', compact('version', 'language', 'page', 'contents'));
        } catch (FileNotFoundException $exception) {
            return redirect('/docs');
        }
    }
}

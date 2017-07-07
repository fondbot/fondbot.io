<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\DocsShowComposer;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('docs.show', DocsShowComposer::class);
    }
}

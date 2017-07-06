<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\ViewComposers\DocsShowComposer;
use App\Http\ViewComposers\ProfileShowComposer;
use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('docs.show', DocsShowComposer::class);
    }
}
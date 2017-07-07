<?php

namespace App\Console\Commands;

use App\Services\Version;
use App\Services\Documentation;
use Illuminate\Console\Command;

class DocumentationSync extends Command
{
    protected $signature = 'documentation:sync';
    protected $description = 'Synchronize documentation.';

    public function handle(): void
    {
        /** @var Documentation $service */
        $service = resolve(Documentation::class);

        $service->purge();

        Version::all()->each(function (string $version) use (&$service) {
            $service->download($version);
            $service->compile($version);
        });

        $this->info('Synchronization complete.');
    }
}

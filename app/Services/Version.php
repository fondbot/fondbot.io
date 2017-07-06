<?php

declare(strict_types=1);

namespace App\Services;

use Composer\Semver\Comparator;
use Illuminate\Support\Collection;

class Version
{
    /**
     * Get all versions.
     *
     * @return Collection
     */
    public static function all(): Collection
    {
        return collect([
            'master',
        ]);
    }

    /**
     * Get latest version.
     *
     * @return string
     */
    public static function latest(): string
    {
        return self::all()
            ->sort(function (string $a, string $b) {
                return Comparator::lessThan($a, $b);
            })
            ->first();
    }
}
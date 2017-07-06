<?php

declare(strict_types=1);

namespace App\Entities;

class Language
{
    const EN = 'en';

    private static $routeKeys = [
        self::EN => 'en',
    ];

    private static $titles = [
        self::EN => 'English',
    ];

    public static function getRouteKey(string $value): string
    {
        return self::$routeKeys[$value];
    }

    public static function title(string $value): string
    {
        return self::$titles[$value];
    }

    public static function titles(): array
    {
        return self::$titles;
    }
}
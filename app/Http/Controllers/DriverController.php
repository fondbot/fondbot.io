<?php

declare(strict_types=1);

namespace App\Http\Controllers;

/**
 * @deprecated Will be moved to API service
 */
class DriverController extends Controller
{
    private $official = [
        [
            'name' => 'telegram',
            'package' => 'fondbot/telegram',
            'repository' => 'http://github.com/fondbot/drivers-telegram',
            'official' => true,
            'versions' => ['1.0'],
        ],
        [
            'name' => 'facebook',
            'package' => 'fondbot/facebook',
            'repository' => 'http://github.com/fondbot/drivers-facebook',
            'official' => true,
            'versions' => ['1.0'],
        ],
        [
            'name' => 'vk-communities',
            'package' => 'fondbot/vk-communities',
            'repository' => 'https://github.com/fondbot/drivers-vk-communities',
            'official' => true,
            'versions' => ['1.0'],
        ],
    ];

    public function index(): array
    {
        return $this->official;
    }
}
<?php

declare(strict_types=1);

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Link;

class DocsShowComposer
{
    private $items = [
        'Getting Started' => [
            '/introduction' => 'Introduction',
            '/installation' => 'Installation',
            '/configuration' => 'Configuration',
        ],
        'Core Concepts' => [
            '/intents' => 'Intents',
            '/interactions' => 'Interactions',
            '/sending-messages' => 'Sending Messages',
            '/templates' => 'Templates',
        ],
        'Drivers' => [
            '/drivers/telegram' => 'Telegram',
            '/drivers/facebook' => 'Facebook',
            '/drivers/vk-communities' => 'VK Communities',
        ],
    ];

    public function compose(View $view): void
    {
        $base = Menu::new()->addClass('menu-list');
        $menus = [];

        $language = $view->offsetGet('language');
        $version = $view->offsetGet('version');

        foreach ($this->items as $label => $links) {
            $menu = (clone $base)->prepend('<p class="menu-label">' . $label . '</p>');

            foreach ($links as $uri => $title) {
                $menu->add(Link::to('/docs/' . $language . '/' . $version . $uri, $title));
            }

            $menus[] = $menu;
        }

        $view->with('menus', $menus);
    }
}
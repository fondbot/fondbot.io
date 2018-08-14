# VK

::: warning
VK driver documentation is still under development.
:::

[[toc]]

## Introduction

This driver uses official VK SDK [vkcom/vk-php-sdk](https://github.com/VKCOM/vk-php-sdk) in order to interact with VK API.

If you do not have a VK bot registered already, go through the [official documentation](https://vk.com/dev/bots_docs) in order to create one.

## Installation

In order to support VK, you need to install driver.

Install it using artisan command:

```bash
php artisan fondbot:driver:install vk
```

or install using Composer:

```bash
composer require fondbot/drivers-vk
```

## Configuration    

Define VK channel in `src/Providers/ChannelServiceProvider.php`:

```php
protected function channels(): array
{
    return [
        'vk' => [
            'driver' => 'vk',
            'access_token' => env('VK_ACCESS_TOKEN'),
            'confirmation_token' => env('VK_CONFIRMATION_TOKEN'),
            'secret_key' => env('VK_SECRET_KEY'),
            'group_id' => env('VK_GROUP_ID'),
        ],
    ];
}
```

::: tip
You may register as many VK channels as you need.
:::


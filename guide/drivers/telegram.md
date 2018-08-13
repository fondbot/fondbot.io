# Telegram

[[toc]]

::: warning
Telegram driver documentation is still under development.
:::

## Introduction

This driver uses [unreal4u/telegram-api](https://github.com/unreal4u/telegram-api) in order to interact with Telegram Bot API.

If you do not have a Telegram bot registered already, go through the [official documentation](https://core.telegram.org/bots#3-how-do-i-create-a-bot) in order to create one and obtain access token.

## Installation

In order to start using Telegram, you need to install it.

Install it using artisan command:

```bash
php artisan fondbot:driver:install telegram
```

or install using Composer:

```bash
composer require fondbot/drivers-telegram
```

## Configuration    

Define Telegram channel in `src/Providers/ChannelServiceProvider.php`:

```php
public function channels(): array
{
    return [
        'telegram' => [
            'driver' => 'telegram',
            'token' => env('TELEGRAM_TOKEN'),
        ],
    ];
}
```

::: tip
You may register as many Telegram channels as you need.
:::

## Registering Webhook

After defining telegram channel in service provider, you may wish to set webhook URL in order to receive updates from your Telegram bot. 

::: warning Webhook limitations
Telegram requires only HTTPS for webhooks. We recommend [valet share](https://laravel.com/docs/valet#sharing-sites) for development purposes.
:::

Using artisan command you can set webhook url. Take note, that this command uses `APP_URL` from your `.env` file.

```bash
php artisan fondbot:driver:telegram:set-webhook
```

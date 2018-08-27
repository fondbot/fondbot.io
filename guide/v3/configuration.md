# Configuration

[[toc]]

As mentioned before, FondBot is powered by the Laravel framework and if you are familiar with this framework you will not have problems in installing and customizing your configuration.
But if you are a newcomer, go through the [official Laravel documentation](https://laravel.com/docs/configuration). 
Also, you might be interested in [Cache](https://laravel.com/docs/cache), [Queues](https://laravel.com/docs/queues) and [Database](https://laravel.com/docs/eloquent) sections.

## Channels

Channel is a connection to bot api. You can manage your channels in `app/Providers/ChannelServiceProvider.php`.
Register as many channels as required by your applications. Also, FondBot does not restrict you to having only one channel for driver. Hence, you can also register two or more channels for one driver:

```php
protected function channels(): array
{
    return [
        'foo' => [
            'driver' => 'telegram',
            'token' => env('TELEGRAM_FOO_TOKEN'),
        ],
        'bar' => [
            'driver' => 'telegram',
            'token' => env('TELEGRAM_BAR_TOKEN'),
        ],
    ];
}
 ```

To view a list of all channels registered in application, you may use ```fondbot:channel:list``` artisan command:

 ```bash
 php artisan fondbot:channel:list
 ```

::: tip
This command will also show a webhook URL for each channel.
:::

## Protecting Channel Webhooks

You are likely want to protect your channel webhook routes from unauthorized access. Just add `webhook-secret` to your driver options with a random string and it will be appended to the URL.

```php
protected function channels(): array
{
    return [
        'telegram' => [
            'driver' => 'telegram',
            'token' => env('TELEGRAM_TOKEN'),
            'webhook-secret' => 'some-random-string',
        ],
    ];
}
```


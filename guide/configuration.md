# Configuration

As mentioned before, FondBot is powered by the Laravel framework and if you are familiar with this framework you will not have problems in installing and customizing your configuration.
But if you are a newcomer, go through the [official Laravel documentation](https://laravel.com/docs/5.5/configuration). 
Also, you might be interested in [Cache](https://laravel.com/docs/5.5/cache), [Queues](https://laravel.com/docs/5.5/queues) and [Database](https://laravel.com/docs/5.5/eloquent) sections.

## Channels

Channel is a connection to the messenger service. There is a `app/Providers/ChannelServiceProvider.php` where you define all your channels.

Here is an example where we define channel called `telegram` which will use `telegram` as a driver, the other options stand for driver options.

```php
<?php

declare(strict_types=1);

namespace Bot\Providers;

use FondBot\Foundation\Providers\ChannelServiceProvider as ServiceProvider;

class ChannelServiceProvider extends ServiceProvider
{
    /**
     * Define bot channels.
     *
     * @return array
     */
    protected function channels(): array
    {
        return [
            'telegram' => [
                'driver' => 'telegram',
                'token' => env('TELEGRAM_TOKEN'),
            ],
        ];
    }
}
```

To get a list of all register channels execute the `channel:list` toolbelt command:

```bash
php toolbelt channel:list
```

### Protecting Channel Webhooks

You are likely want to protect your channel webhook routes from unauthorized access. Just add `webhook-secret` to your driver options with a random string and it will be appended to the URL.

```php
<?php

declare(strict_types=1);

namespace Bot\Providers;

use FondBot\Foundation\Providers\ChannelServiceProvider as ServiceProvider;

class ChannelServiceProvider extends ServiceProvider
{
    /**
     * Define bot channels.
     *
     * @return array
     */
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
}
```


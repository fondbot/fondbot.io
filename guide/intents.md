# Intents

[[toc]]

## Introduction
Intent is a command which is been executed upon activation.
Upon running you can send messages, attachments and templates.

In order to create dialog and process user replies you need to use [interactions](/interactions).

## Creating Intents
Create new intent by running artisan command:

```bash
php artisan fondbot:make:intent WeatherIntent
```

This command will create `app/Intents/WeatherIntent.php` file which will contain the following class:

```php
<?php

declare(strict_types=1);

namespace App\Intents;

use FondBot\Conversation\Activators\Exact;
use FondBot\Conversation\Intent;
use FondBot\Events\MessageReceived;

class WeatherIntent extends Intent
{
    /**
     * Intent activators.
     *
     * @return \FondBot\Contracts\Conversation\Activator[]
     */
    public function activators(): array
    {
        return [
            Exact::make('/weather'),
        ];
    }

    public function run(MessageReceived $message): void
    {
        // Send reply to user, jump to interaction or do something else...
    }
}
```

## Handling Intent
When one of the intent activator matches, `run` method will be executed by framework.
Here you can do some tasks like fetching data from external API and then sending result to the user.
Go to the [sending messages](/sending-messages) section to learn more about message templates.

If you want to create dialog with user and process his reply you need to make a transition to an [interaction](/interactions) from your intent:

```php
public function run(MessageReceived $message): void
{
    Interactions\AskCityInteraction::jump();
}
```

## Injecting Dependencies

FondBot loves Laravel's approach to the DI, so you can inject any dependencies through intent constructor as you do it in Laravel.
 
```php
class WeatherIntent extends Intent
{
    public function __construct(WeatherApi $api) 
    {
        $this->api = $api;
    {   
    ...
}
```

## Activators
From the above example, if user sends `/weather` then `WeatherIntent` will be activated. 

### Exact

Received message text must match the given value.

```php
use FondBot\Conversation\Activators\Exact;

Exact::make('weather in New York');
```

### Contains

Received message text contains one or more values using [str_contains](https://laravel.com/docs/helpers#method-str-contains) helper.
Since this activator requires an array of values you may use `Activator` class in order to create activator instance.

```php
use FondBot\Conversation\Activators\Contains;

Contains::make(['weather in', 'is it raining in'])
```

### Regex

Received message text is matched by a regular expression using [str_is](https://laravel.com/docs/helpers#method-str-is).

```php
use FondBot\Conversation\Activators\Regex;

Regex::make(['weather in', 'is it raining in'])
```

### In

Received message text is one of given values using `in_array` function. 
The In Array activator checks if message text matches one of the values from the array.

Since this activator requires an array of values you may use `Activator` class in order to create activator instance.

```php
use FondBot\Conversation\Activators\In;

In::make(['first', 'second'])
```

### Attachment

Received message contains attachment.

```php
use FondBot\Conversation\Activators\Attachment;

// any attachment
Attachment::make();

// only image attachment
Attachment::make()->image();
```

### Payload

Received message payload data must match the given value.

```php
use FondBot\Conversation\Activators\Payload;

Payload::make('foo');
```

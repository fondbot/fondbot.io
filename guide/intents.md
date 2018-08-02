# Intents

## Introduction
Intent is a command which is been executed upon activation.
Upon running you can send messages, attachments and templates.

In order to create dialog and process user replies you need to use [interactions](/interactions).

## Creating Intents
Create new intent by running toolbelt command:

    php toolbelt make:intent WeatherIntent

This command will create `app/Intents/WeatherIntent.php` file which will contain the following class:

```php
<?php

declare(strict_types=1);

namespace Bot\Intents;

use FondBot\Conversation\Activator;
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
            'exact:/weather',
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

    public function run(MessageReceived $message): void
    {
        Interactions\AskCityInteraction::jump();
    }

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

### Available Activators

#### exact:value

Received message text must match the given value.

#### contains:foo,bar,...

Received message text contains one or more values using [str_contains](https://laravel.com/docs/5.5/helpers#method-str-contains) helper.
Since this activator requires an array of values you may use `Activator` class in order to create activator instance.

```php
Activator::contains(['weather in', 'is it raining in'])
```

#### regex:pattern

Received message text is matched by a regular expression.

#### in:foo,bar,...

Received message text is one of given values using `in_array` function. 
The In Array activator checks if message text matches one of the values from the array.

Since this activator requires an array of values you may use `Activator` class in order to create activator instance.

```php
Activator::in(['first', 'second'])
```

#### attachment

Received message must contain any attachment or attachment of given type.

```php
Activator::attachment() // any attachment
Activator::attachment()->image() // only image attachment
```

#### payload:value

Received message payload data must match the given value.



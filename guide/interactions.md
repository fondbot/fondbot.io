# Interactions

[[toc]]

## Introduction

Interactions are used for situations when you need to ask user some questions and process replies.

Within your [intent](/guide/intents.md), use `jump` method on interaction class to start dialog with user.

## Creating Interactions

### Generating Interaction Classes

All interactions are stored in `app/Interactions` directory. If `app/Interactions` directory does not exist, it will be created when your run `fondbot:make:interaction` command.

Create new interaction by running artisan command:

```bash
php artisan fondbot:make:interaction AskPizzaType
```

### Class Structure

Interactions consist of two methods by default: `run` and `process`.
When you jump to an interaction from intent `run` method will be executed, where you may define what you expect from user. For example, you may ask pizza type which user wishes to order.

After user replies, `process` method will be executed with `MessageReceived` object provided. Here you may request a third-party API, find a record in database and reply to user.


If you don't jump to another interaction or restart current interaction, session will be closed and bot will wait for another intent. 

```php   
<?php

declare(strict_types=1);

namespace App\Interactions;

use FondBot\Conversation\Interaction;
use FondBot\Events\MessageReceived;

class AskPizzaType extends Interaction
{
    /**
     * Run interaction.
     *
     * @param MessageReceived $message
     */
    public function run(MessageReceived $message): void
    {
        // Send message, show keyboard or do something else...
    }

    /**
     * Process received message.
     *
     * @param MessageReceived $reply
     */
    public function process(MessageReceived $reply): void
    {
        // Process reply to the message you sent in method "run".
    }
}
```

## Restarting Interactions

You make restart current interaction by calling `restart` method. This method helps you to ask question from user again, if user's reply does not seem to be valid.

```php
<?php

declare(strict_types=1);

namespace App\Interactions;

use App\Pizza;
use FondBot\Conversation\Interaction;
use FondBot\Events\MessageReceived;
use FondBot\Templates\Keyboard;

class AskPizzaType extends Interaction
{
    /**
     * Run interaction.
     *
     * @param MessageReceived $message
     */
    public function run(MessageReceived $message): void
    {
        $this->reply('Choose pizza')->template(Keyboard::make([
            Keyboard\ReplyButton::make('Pepperoni'),
            Keyboard\ReplyButton::make('Margherita'),
            Keyboard\ReplyButton::make('Cheeseburger'),
        ]));
    }

    /**
     * Process received message.
     *
     * @param MessageReceived $reply
     */
    public function process(MessageReceived $reply): void
    {
        $pizza = Pizza::whereType($reply->getText())->first();

        if (!$pizza) {
            $this->reply('Sorry, we do not have ' . $reply->getText() . '.');

            $this->restart();

            return;
        }

        if($pizza->remaining === 0) {
            $this->reply('Sorry, '.$reply->getText().' is out of stock.');

            $this->restart();

            return;
        }

        //
    }
}
```

## Jumping To Another Interactions

If you wish to ask another question within current session, you may jump to another interaction from `process` method.

```php
public function process(MessageReceived $reply): void
{
    if($pizza->remaining === 0) {
        $this->reply('Sorry, '.$reply->getText().' is out of stock.');

        $this->restart();

        return;
    }

    AskPizzaSize::jump();
}
```
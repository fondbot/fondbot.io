# Sending Messages
You are eligible for sending messages only from intents or interactions.

## Text With Template
In order to send message with text with or without template within intent or interaction use `reply` method:

### Basic Message

```php
<?php

declare(strict_types=1);

namespace Bot\Intents;

use FondBot\Conversation\Intent;
use FondBot\Events\MessageReceived;

class WeatherIntent extends Intent
{
    /**
    * Intent activators.
    *
    * @return Activator[]
    */
    public function activators(): array
    {
        return [
            'exact:/weather',
            'exact:Tell me the weather for today',
        ];
    }

    public function run(ReceivedMessage $message): void
    {
        $this->reply('The weather is fine today.');
    }
}
```

### Delayed Message
If you want to send message with delay, pass the number of seconds to the third argument:

    $this->reply('If you need an additional information type /help.', null, 3);

From the above example a message with `If you need an additional information type /help.` text will be sent in 3 seconds.

### Sending Templates
FondBot supports sending templates. Pass template object in the second argument to `sendMessage` method:

```php
Keyboard::create([
	Keyboard\ReplyButton::create('Yes, please.'),
	Keyboard\ReplyButton::create('No.'),
]);
```

```php
$this->reply('Should I send you a weather forecast every day?', $keyboard);
```

You can read more about templates in the [templates](/templates) section.

## Attachments
Sending attachment is an ease:

```php
$attachment = Attachment::create(Attachment::TYPE_IMAGE, 'http://lorempixel.com/400/200/');
        
$this->sendAttachment($attachment);
```    

Naturally, delay is also supported in attachment sending:

```php
$attachment = Attachment::create(Attachment::TYPE_IMAGE, 'http://lorempixel.com/400/200/');

$this->sendAttachment($attachment, 3);
```


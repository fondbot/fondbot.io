# Sending Messages

[[toc]]

::: warning LIMITATIONS
Currently, messages can be sent only from intents and interactions.
:::

## Simple Text Message

```php
$this->reply('Your order confirmed.');
```
## Sending Templates

```php
$keyboard = Keyboard::make([
    ReplyButton::make('Yes.'),
    ReplyButton::make('No.'),
]);

$this->reply('Are you sure?')->template($keyboard);
```
## Attachments

```php
$attachment = Attachment::image('http://lorempixel.com/400/200/');

$this->sendAttachment($attachment);
```

Sending attachments can be delayed too:

```php
$attachment = Attachment::image('http://lorempixel.com/400/200/');

$this->sendAttachment($attachment);
```

## Delay Sending

::: warning
In order to use delayed message sending, setup [queues](https://laravel.com/docs/5.6/queues).
:::

Both `reply` and `sendAttachment` methods can be delayed:

```php
$this->reply('Hello')->delay(5); // send message in 5 seconds

$this->sendAttachment($attachment)->delay(now()->addMinutes(15)); // send message in 15 minutes
```


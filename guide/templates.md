# Templates

[[toc]]

## Introduction
Template is an UI element which bot can send to a user.
Some templates are generic and work across all platforms, but some of them are platform-specific.

Managing templates can be painful, so FondBot aims to provide a convenient way to use them.

It is worth noting that not all platforms support templates, but drivers are designed to send them only if supported. 
Keep in mind that when you are developing your bot for several platforms.  

## Keyboard

Keyboard is the main reason people love chatbots. So, use them wisely and your bot UX will be fantastic.

Here is an example of creating keyboard and sending it to user:

```php
$keyboard = Keyboard::make([
    Keyboard\ReplyButton::make('Yes, please.'),
    Keyboard\ReplyButton::make('No.'),
]);

$this->reply('Should I send you a weather forecast every day?')->template($keyboard);
```

## Available Keyboard Buttons

Here is a list of all available generic keyboard buttons, which are included in FondBot framework and every driver should support them. Also, note that every driver may support it's own platform-specific buttons. Please, refer desired driver's documentation in order to find out all of them.

### Reply Button

```php
use FondBot\Templates\Keyboard\ReplyButton;

ReplyButton::make('foo');
```

### Payload Button

```php
use FondBot\Templates\Keyboard\PayloadButton;

PayloadButton::make('foo', 'some_data');
```

### URL Button

```php
use FondBot\Templates\Keyboard\UrlButton;

UrlButton::make('Open link', 'https://fondbot.io');
```
# Templates

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
$keyboard = (new Keyboard)
    ->addButton(
        (new Keyboard\ReplyButton)->setLabel('Yes, please.')
    )
    ->addButton(
        (new Keyboard\ReplyButton)->setLabel('No.')
    );

$this->reply('Should I send you a weather forecast every day?')->template($keyboard);
```


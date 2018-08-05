---
home: true
heroImage: /logo.svg
actionText: Get Started →
actionLink: /guide/
features:
- title: Advanced Dialog System
  details: Build complex dialogs with an ease
- title: Code once, run everywhere
  details: Single API for all supported platforms          
- title: Laravel-Powered
  details: Built on top of powerful Laravel framework.        
footer: MIT Licensed | Copyright © 2017-present Vladimir Yuldashev
---

```php
class WeatherIntent extends Intent
{
    public function activators(): array
    {
        return [
            Exact::make('/weather'),
            Exact::make('Tell me the weather for today'),
        ];
    }

    public function run(ReceivedMessage $message): void
    {
        $this->reply('Weather is nice today.');
    }
}
```
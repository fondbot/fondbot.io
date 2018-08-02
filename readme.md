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
- title: Performant
  details: VuePress generates pre-rendered static HTML for each page, and runs as an SPA once a page is loaded.
footer: MIT Licensed | Copyright © 2017-present Vladimir Yuldashev
---

```php
class WeatherIntent extends Intent
{
    public function activators(): array
    {
        return [
            $this->exact('/weather'),
            $this->exact('Tell me the weather for today'),
        ];
    }

    public function run(ReceivedMessage $message): void
    {
        $this->sendMessage('Weather is nice today.');
    }
}
```
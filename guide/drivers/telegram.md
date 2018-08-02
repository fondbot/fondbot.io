# Telegram

In order to create Telegram channel you need to create bot and obtain access token.

You can find all related information in the [official guide](https://core.telegram.org/bots#3-how-do-i-create-a-bot). 

## Installation

In your project root run the following command:

    php toolbelt driver:install telegram

### Configuration    

Define Telegram channel in `src/Providers/ChannelServiceProvider.php`:

    public function channels(): array
    {
        return [
            'telegram' => [
                'driver' => 'telegram',
                'token' => env('TELEGRAM_TOKEN'),
            ],
        ];
    }

### Registering Webhook

Telegram requires HTTPS for webhook urls. Read more about Telegram Webhook in the [official guide](https://core.telegram.org/bots/webhooks).

Then, using curl tell Telegram which URL to use for sending updates from bot:

    curl -F “url=https://<YOURDOMAIN>/<WEBHOOKLOCATION>" https://api.telegram.org/bot<TOKEN-OBTAINED-FROM-TELEGRAM>/setWebhook    

You can find route URL for your channels by running:

    php toolbelt channel:list

## Templates

### Request Contact Button

    $keyboard = (new Keyboard)
        ->addButton(
            (new RequestContactButton)->setLabel('Send my phone number.')
        );

    $this->sendMessage('What\'s your phone number? Our support team will call you back.', $keyboard);

### Request Location Button

    $keyboard = (new Keyboard)
        ->addButton(
            (new RequestLocationButton)->setLabel('Send my location.')
    );

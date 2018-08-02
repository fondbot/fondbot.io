# Interactions

## Introduction
Interaction is used when bot needs to process user reply aka dialog.

Bot can jump to interaction from [intent](/intents) by calling `jump` method.

## Creating Interactions

Create new interaction by running toolbelt command:

    php toolbelt make:interaction AskCity

This command will generate `app/Interactions/AskCityInteraction.php` file which will contain the following class:
   
    <?php
    
    declare(strict_types=1);
    
    namespace Bot\Interactions;
    
    use FondBot\Conversation\Interaction;
    use FondBot\Drivers\ReceivedMessage;
    use GuzzleHttp\Client;
    
    class AskCityInteraction extends Interaction
    {
        /**
         * Run interaction.
         *
         * @param ReceivedMessage $message
         */
        public function run(ReceivedMessage $message): void
        {
            $this->sendMessage('Where are you?');
        }
    
        /**
         * Process received message.
         *
         * @param ReceivedMessage $reply
         */
        public function process(ReceivedMessage $reply): void
        {
            // Bot can find information only for some cities
            $city = $reply->getText();
            $cities = ['London', 'New York', 'Moscow'];
            if (!in_array($city, $cities, true)) {
                $this->sendMessage(
                    'Right know, I can find an information about weather only for ' . implode($cities, ', ') . '.'
                );
    
                $this->restart();
    
                return;
            }
    
            // Fetch weather data
            $guzzle = new Client;
            $response = $guzzle->get('http://samples.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=b1b15e88fa797225412429c1c50c122a1');
            $response = json_decode($response->getBody()->getContents());
    
            // Send result to user
            $this->sendMessage($response->weather->description);
        }
    } 
    
## Handling Interaction    
When bot jumps to interaction the framework will execute method `run`. 
In this method you need to send some question or/and keyboard for user in order to receive reply. 

After that, bot will wait for user reply and when the message is received method `process` will be executed.
Here you can send message to the user again, restart interaction (if something went wrong or user did not respond correctly) or jump to another interaction.

If you don't restart current interaction or jump to another interaction current session will be closed and bot will be ready to activate intents again.

    

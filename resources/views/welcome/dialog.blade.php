<!-- Advanced Dialog System -->
<section class="hero is-medium is-dark is-bold is-fullwidth">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column">
                            <pre><code class="language-php">class WeatherIntent extends Intent
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
}</code></pre>
                </div>

                <div class="column has-text-right">
                    <h1 class="title">
                        Advanced Dialog System
                    </h1>
                    <h2 class="subtitle">
                        Build complex dialogs with an ease
                    </h2>
                </div>
            </div>

        </div>
    </div>
</section>
@extends('layouts.master')

@section('content')
    <div class="landing">
        <section class="hero is-medium has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <p class="head">
                        <img src="/images/logo.png">
                    </p>

                    <p class="title is-4 is-spaced">
                        PHP framework that helps build scalable and cross-platform chatbots
                    </p>

                    <div class="container">
                        <a class="button is-info is-medium" href="/docs">
                            <span class="icon"><i class="fa fa-book"></i></span>
                            <span>Get Started</span>
                        </a>
                        <a class="button is-medium" href="https://github.com/fondbot/fondbot">
                            <span class="icon"><i class="fa fa-github"></i></span>
                            <span>GitHub</span>
                        </a>
                        <a class="button is-medium" href="https://fondbot.signup.team">
                            <span class="icon"><i class="fa fa-slack"></i></span>
                            <span>Slack</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        @include('welcome.dialog')
        {{--@include('welcome.toolbelt')--}}
        @include('welcome.drivers')
    </div>
@endsection

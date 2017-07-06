<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    @include('layouts.favicon')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

<div id="app">
    @include('layouts.header')

    @yield('content')
</div>

@include('layouts.footer')

<script src="/js/app.js"></script>
@stack('scripts')

@include('layouts.google-analytics')

</body>
</html>
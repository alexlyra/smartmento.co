<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="icon" href="{{ asset('storage/images/icon.png') }}" sizes="32x32" />
        <link rel="icon" href="{{ asset('storage/images/icon.png') }}" sizes="192x192" />
        <link rel="apple-touch-icon" href="{{ asset('storage/images/icon.png') }}" />
        <meta name="msapplication-TileImage" content="{{ asset('storage/images/icon.png') }}" />

        <meta name="title" content="{{ Config::get('app.name') }}">
        <meta name="description" content="{{ Config::get('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ Config::get('app.name') }}</title>
        @stack('header')
        <link rel="stylesheet" href="{{ asset('mdb/css/mdb.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('styles')
    </head>
    <body>
        @stack('body')
        @yield('content')
        @yield('modals')
        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>

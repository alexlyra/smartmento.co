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
       
        @if (Config::get('app.env') === 'production')
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-6R8JZ4DRYT"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-6R8JZ4DRYT');
            </script>

            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-WZM7MRW');</script>
            <!-- End Google Tag Manager -->

            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZM7MRW"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        @endif

        <meta name="title" content="{{ Config::get('app.name') }}">
        <meta name="description" content="{{ Config::get('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ Config::get('app.name') }}</title>
        @stack('header')
        <link rel="stylesheet" href="{{ asset('mdb/css/mdb.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css?v=0.0.3.0') }}">
        @stack('styles')
    </head>
    <body>
        <x-menu />
        @stack('body')
        @yield('content')
        <x-footer />
        @yield('modals')
        <script src="{{ asset('mdb/js/mdb-pt_BR.js') }}"></script>
        <script src="{{ asset('js/app.js?v=0.0.3.0') }}"></script>
        @stack('scripts')
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- SEO Meta details -->
        <title>{{ config('app.name') }} | @yield('slogan', 'bee-a-vee-a-en-cee-o')</title>
        <meta name="description" content="Welcome to the Bavanco website, each card links to an individual page. The design is based on title deed cards from a 1950's Monopoly set.">
        <meta name="author" content="Adrian Bavister">

        <!-- Fonts (CDN) -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Raleway:500,600,900' rel='stylesheet'>

        <!-- Characters for Ditto Marks (CDN) -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:800&amp;text=,' rel='stylesheet'>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>

    <body class="green-felt">
        <div id="app">

            <!-- Sticky Header -->
            <header id="app-header">
                <div class="slogan">@yield('slogan', 'bee-a-vee-a-en-cee-o')</div>
                <h1>Bavanco</h1>
            </header>

            <!-- Page Content -->
            @yield('content')

            <!-- Footer -->
            <footer>
                Copyright © 2002 - {{ date('Y') }} Bavanco
            </footer>

        </div>

        <!-- Scripts -->
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>

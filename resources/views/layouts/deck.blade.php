<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- SEO Meta details -->
        <title>{{ config('app.name') }} | bee-a-vee-a-en-cee-o</title>
        <meta name="description" content="Welcome to the Bavanco Website">
        <meta name="author" content="Adrian Bavister">

        <!-- Fonts (CDN) -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Raleway:500,600,900' rel='stylesheet'>

        <!-- Characters for Ditto Marks (CDN) -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:800&amp;text=,' rel='stylesheet'>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    </head>

    <body class="green-felt">

        <!-- Sticky Header -->
        <header id="app-header">
            <div class="slogan">bee-a-vee-a-en-cee-o</div>
            <h1>Bavanco</h1>
        </header>

        <!-- Page Content (Typically a deck of cards) -->
        @yield('content')

        <!-- Footer -->
        @include('layouts.partials.footer')

        <!-- Scripts -->
        <script src="{{ elixir('js/app.js') }}"></script>

    </body>
</html>

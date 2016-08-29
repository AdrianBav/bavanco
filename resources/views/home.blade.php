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

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Raleway:500,600' rel='stylesheet'>

        <!-- Characters for Ditto Marks -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:800&amp;text=,' rel='stylesheet'>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>

    <body class="green-felt">

        <!-- Sticky Header -->
        <header id="app-header">
            <div class="slogan">bee-a-vee-a-en-cee-o</div>
            <h1>Bavanco</h1>
        </header>

        <!-- Container of Deed cards -->
        <div class="container">
            @foreach ($cards as $card)
            <a class="item" href="{{ $card->url }}" target="{{ $card->target() }}">
                @include($card->partial(), array_merge($card->data(), ['leaderboard' => $rankings[$card->id]]))
            </a>
            @endforeach
        </div>

        @include('partials.footer')

        <!-- Sticky Header script -->
        <script>
            window.onscroll = function() {
                if (window.pageYOffset > 1) {
                    document.getElementById( "app-header" ).classList.add( "sticky" );
                } else {
                    document.getElementById( "app-header" ).classList.remove( "sticky" );
                }                
            };
        </script>

    </body>
</html>
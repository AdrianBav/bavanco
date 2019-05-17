@extends('layouts.app')


@section('content')

<!-- Container of Deed cards -->
<div class="container">

    @foreach ($cards as $card)
    <div class="flip-card">
        <div class="flip-card-inner">

            <a class="item flip-card-front">
                @include($card->partial)
            </a>

            <a class="item flip-card-back">
                @include("decks.default-mortgaged.{$card->site_identifier}")
            </a>

        </div>
    </div>
    @endforeach

</div>

@endsection

@extends('layouts.app')
@section('slogan', 'Monopoly Title Deed Cards')


@section('content')

<!-- Container of Deed cards -->
<div class="container">

    @foreach ($cards as $card)
    <deed>

        <template slot="front">
            @include($card->partial)
        </template>

        <template slot="back">
            @include("decks.default-mortgaged.{$card->site_identifier}")
        </template>

    </deed>
    @endforeach

</div>

@endsection

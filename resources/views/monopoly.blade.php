@extends('layouts.app')


@section('content')

<!-- Container of Deed cards -->
<div class="container">

    @foreach ($cards as $card)
    <card>

        <template slot="front">
            @include($card->partial)
        </template>

        <template slot="back">
            @include("decks.default-mortgaged.{$card->site_identifier}")
        </template>

    </card>
    @endforeach

</div>

@endsection

@extends('layouts.deck')


@section('content')

<!-- Container of Deed cards -->
<div class="container">
    @foreach ($cards as $card)
    <a class="item" href="{{ $card->url }}" target="{{ $card->target() }}">
        @include($card->partial(), $card->data())
    </a>
    @endforeach
</div>

@endsection

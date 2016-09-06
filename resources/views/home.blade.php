@extends('layouts.deck')


@section('content')

<!-- Container of Deed cards -->
<div class="container">
    @foreach ($cards as $card)
    <a class="item" href="{{ $card->url }}" target="{{ $card->target() }}">
        @include($card->partial(), array_merge($card->data(), ['rankings' => $rankings[$card->id]]))
    </a>
    @endforeach
</div>

@endsection

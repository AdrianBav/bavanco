@extends('layouts.deck')


@section('content')

<div style="width: 1000px; margin: 0 auto;">
    
	<br><br>

	<!-- Intro -->
	@include('deeds.cards.welcome')
	<br><br>

    @include('deeds.cards.actual')
	<br><br>

	<!-- Deed comparison -->
	@include('deeds.cards.comparison')
	<br><br>

	<figure>
		<img src="{{ asset('images/deed_comparison.jpg') }}" alt="Deed comparison">
		<figcaption>Left: Scan of original | Right: CSS Rendering</figcaption>
	</figure>
	<br><br>

	<!-- Link to Monopoly page -->
	<a class="card-link" href="/monopoly">
    	@include('deeds.cards.monopoly')
	</a>
	<br><br>

	<!-- Link back to home page -->
	<a class="card-link" href="/">
    	@include('deeds.cards.back')
    </a>
	<br><br>

</div>

@endsection

@extends('layouts.deck')


@section('content')

<div style="width: 1000px; margin: 0 auto;">
    
	<br><br>

	@include('deeds.cards.bank')
	<br><br>

	<img src="" alt="Show photopgraphs of board detail">
	<br><br>

    @include('deeds.cards.history')
	<br><br>

	<figure>
		<img src="" alt="Photo">
		<div class="css-deed"></div>
		<figcaption>Show comparison of photo vs CSS render vs modern card</figcaption>
	</figure>
	<br><br>

	<!-- Link to Monopoly page -->
	<a class="card-link" href="/monopoly">
    	@include('deeds.cards.advance-go')
	</a>

	<br><br>

	<!-- Back to home page -->
	<a class="card-link" href="/">
    	@include('deeds.cards.go-back')
    </a>

	<br><br>

</div>

@endsection

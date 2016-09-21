@extends('layouts.deck')


@section('content')

<div id="about-page" class="container">
    
	<a class="card-link" href="javascript:void(0);">
		@include('deeds.cards.welcome')
	</a>

	<a class="card-link" href="javascript:void(0);">
    	@include('deeds.cards.actual')
	</a>

	<a class="card-link" href="javascript:void(0);">
		@include('deeds.cards.replicated')
	</a>

	<a class="card-link" href="javascript:void(0);">
		@include('deeds.cards.comparison')
	</a>

	<a class="card-link" href="javascript:void(0);">
		@include('deeds.cards.details')
	</a>

	<figure>
		<img src="{{ asset('images/deed_comparison.jpg') }}" alt="Comparison of Title Deed cards">
		<figcaption><strong>Fig A:</strong> On the left, a scan of original and on the right, a CSS rendering.</figcaption>
	</figure>

	<a class="card-link" href="javascript:void(0);">
		@include('deeds.cards.modern')
	</a>	

	<figure>
		<img src="{{ asset('images/deeds_1993.jpg') }}" alt="Title Deed cards from 1993">
		<figcaption><strong>Fig B:</strong> Title Deed Cards from 1993.</figcaption>
	</figure>

	<a class="card-link" href="javascript:void(0);">
    	@include('deeds.cards.disaster')
	</a>

	<figure>
		<img src="{{ asset('images/deeds_1996.jpg') }}" alt="Title Deed cards from 1996">
		<figcaption><strong>Fig C:</strong> Title Deed Cards from 1996.</figcaption>
	</figure>

	<!-- Link to Monopoly page -->
	<a class="card-link" href="/monopoly" target="_blank">
    	@include('deeds.cards.renders')
	</a>

	<!-- Link back to home page -->
	<a class="card-link" href="/">
    	@include('deeds.cards.back')
    </a>

</div>

@endsection

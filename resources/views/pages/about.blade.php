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

	<figure>
		<img src="{{ asset('images/deed_original.jpg') }}" alt="Scan of original Title Deed card" class="bs-img-responsive">
		<figcaption><strong>Fig A:</strong> My scan of an original.</figcaption>
	</figure>

	<figure>
		<img src="{{ asset('images/deed_css_render.jpg') }}" alt="CSS rendering of a Title Deed card" class="bs-img-responsive">
		<figcaption><strong>Fig B:</strong> My CSS rendering.</figcaption>
	</figure>

	<a class="card-link" href="javascript:void(0);">
		@include('deeds.cards.details')
	</a>

	<a class="card-link" href="javascript:void(0);">
		@include('deeds.cards.modern')
	</a>	

	<figure>
		<img src="{{ asset('images/deeds_1993.jpg') }}" alt="Title Deed cards from 1993" class="bs-img-responsive">
		<figcaption><strong>Fig C:</strong> Title Deed Cards from 1993.</figcaption>
	</figure>

	<a class="card-link" href="javascript:void(0);">
    	@include('deeds.cards.disaster')
	</a>

	<figure>
		<img src="{{ asset('images/deeds_1996.jpg') }}" alt="Title Deed cards from 1996" class="bs-img-responsive">
		<figcaption><strong>Fig D:</strong> Title Deed Cards from 1996.</figcaption>
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

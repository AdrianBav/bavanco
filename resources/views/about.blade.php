@extends('layouts.app')
@section('slogan', 'About this Site')


@section('content')
<div id="about-page">

	<h3>About</h3>

	<p>
		Welcome to the Bavanco website.
		Over the years this website has taken many forms.
		(If you are interested, you can view the full back catalogue in the Bavanco archives).
	</p>

	<card-holder class="community-chest-holder">
        <a href="/archives" target="_blank" class="card-link">
        	@include('decks.about.archives')
        </a>

		@include('decks.about.partials.bonus-community-chest')
	</card-holder>

	<p>
		This current incarnation, as you can probably tell, is based on the cards of a Monopoly set.
		But not just any Monopoly set. If you own a fairly recent version you might notice some subtle differences in the graphic design.
		If you own anything other than a London based set, you’ll almost certainly notice some differences.
		This site specifically pays homage to a 1950’s London set of Monopoly.
	</p>


	<h3>Why?</h3>

	<p>
		Because that is the set my dad owned as a child and the set that was passed down to me and my siblings when we were young.
		We grew up playing this mid-century version and it was all we knew.
		Our friends might want to be the iron or the Scottie dog.
		But we, from our selection of post-war pieces, could choose from such tokens as the bulldozer, the Golden Hind or the tank!
		My brother would usually pick the headless man on a motorbike, although I think that was only available in our version.
	</p>

	<figure>
		<img src="{{ asset('images/tokens.jpg') }}" alt="Caption" class="bs-img-responsive border">
		<figcaption><strong>Fig A:</strong> Caption.</figcaption>
	</figure>


	<h3>The Redesign</h3>

	<p>
		The redesign of this website hopes to capture the graphic design styles seen in that post war monopoly set.
		Those styles tend to leak the technical nature of their creator.
		Some of the styles I see in these designs, compared to some of the more modern ones we’ll look at later include; large word spacing, the use of ditto marks and emphasizing text by use of capitalization instead of bold text.
		I’m guessing it was just easier to use uppercase letters than it would have been to use a bolder typeface.
	</p>

	<figure>
		<img src="{{ asset('images/deed-london195x.jpg') }}" alt="Caption" class="bs-img-responsive">
		<figcaption><strong>Fig B:</strong> Caption.</figcaption>
	</figure>

	<p>
		For my site, I have used Monopoly title deed cards to act as links to the various pages of the website.
		Historically I’ve used something like a drop-down menu.
		In recent years, card design has been a popular trend.
		So, I decided to marry it with some of my favorite cards.
		By rendering the cards with HTML and CSS, I can dynamically control the content of the cards.
	</p>

	<figure>
		<img src="{{ asset('images/deed-css-render.jpg') }}" alt="Caption" class="bs-img-responsive">
		<figcaption><strong>Fig C:</strong> Caption.</figcaption>
	</figure>

	<p>
		Comparing the two cards, hopefully you agree that the likeness is good.
		The only real difference is the discoloring and wear and tear on the original.
	</p>

	<card-holder class="chance-holder">
        <a href="{{ route('deeds') }}" target="_blank" class="card-link">
        	@include('decks.about.deeds')
        </a>

		@include('decks.about.partials.bonus-chance')
	</card-holder>


	<h3>Modern Design</h3>

	<p>For comparison, let’s compare the title deed cards from my 1990’s European Edition. The first thing I notice...</p>

	<figure>
		<img src="{{ asset('images/deed-euro1991.jpg') }}" alt="Caption" class="bs-img-responsive">
		<figcaption><strong>Fig D:</strong> Caption.</figcaption>
	</figure>

	<p>
		Moving on to my US, vintage bookshelf edition from the 2000’s. The cards have now lost all of they beautiful qualities.
		A typeface with a serif has been used, everything is center justified, there are no ditto marks, there is an ugly black border about the colored header.
		Overall, it just looks like its been thrown together. I get none of the personality of the creator.
	</p>

	<figure>
		<img src="{{ asset('images/deed-usa2011.jpg') }}" alt="Caption" class="bs-img-responsive">
		<figcaption><strong>Fig E:</strong> Caption.</figcaption>
	</figure>

	<h3>Summary</h3>

	<p>
		Something about that early 1950 graphic design appeals to me greatly.
		Its sad that with all the modern advancements, we’ve ended up, in my opinion, with an inferior design.
		That said, we can still celebrate the past and pine over the nostalgia.
		The Bavanco website fully embraces quirky design and is happy to pay tribute to a masterpiece.
		Enjoy.
	</p>

	<card-holder class="community-chest-holder">
        <a href="{{ route('home') }}" class="card-link">
        	@include('decks.about.home')
        </a>

		@include('decks.about.partials.bonus-community-chest')
	</card-holder>


</div>
@endsection

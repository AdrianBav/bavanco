@extends('layouts.app')
@section('slogan', 'About this Site')


@section('content')
<div id="about-page">

	<h3>About</h3>

	<p>Welcome to the Bavanco website.</p>
	<p>
		Over the years this website has taken on many forms.
		(If you are interested, you can view the full back catalog in the Bavanco archives).
		This current incarnation, as you can probably tell, is based upon the title deed cards of a Monopoly set.
	</p>

	<card-holder class="community-chest-holder">
        <a href="https://archives.bavanco.co.uk" target="_blank" class="card-link">
        	@include('decks.about.archives')
        </a>

		@include('decks.about.partials.bonus-community-chest')
	</card-holder>

	<p>
		But not just any Monopoly set. If you own a fairly recent version you might notice some subtle differences in the graphic design.
		If you own anything other than a London based set, you’ll almost certainly notice some differences.
		This site specifically pays homage to a English set from the 1950’s.
	</p>


	<h3>Why?</h3>

	<p>
		Because that is the set my dad owned as a child and the same set that was passed down to me and my siblings when we were young.
		We grew up playing this mid-century version and it was all we knew.
	</p>
	<p>
		Our friends might want to be the iron or the Scottie dog.
		But from our selection of post-war pieces, we could choose from such tokens as the bulldozer, the Golden Hind or the tank!
		My brother would usually pick the headless man on a motorbike, although I think that was only available in our set.
	</p>

	<figure>
		<img src="{{ asset('images/tokens.jpg') }}" alt="The post-war token selection." class="bs-img-responsive border">
		<figcaption><strong>Fig. A:</strong> The post-war token selection.</figcaption>
	</figure>


	<h3>The Redesign</h3>

	<p>
		The redesign of this website hopes to capture the graphic design styles seen in that old post-war monopoly set.
		I like how those styles tend to leak the technical nature of their creator.
	</p>
	<p>
		Some of the more unique and quirky elements I've noticed include; large word spacing, the plentiful use of ditto marks and emphasizing text by use of capitalization instead of bold text.
		I’m guessing it was just easier to use uppercase letters than it would have been to switch to a bolder typeface.
	</p>

	<figure>
		<img src="{{ asset('images/deed-london195x.jpg') }}" alt="Graphic design with an abundance of character." class="bs-img-responsive">
		<figcaption><strong>Fig. B:</strong> Graphic design with an abundance of character.</figcaption>
	</figure>

	<p>
		For my site, I have used Monopoly title deed cards to act as links to the various pages of the website.
		Historically I’ve used something like a drop-down menu but in recent years,
		'card design' has been a popular website navigation trend and I've decided to embrace it.
	</p>
	<p>
		I decided to implement card design using some of my favorite cards; title deed cards.
		By rendering the cards with HTML and CSS, instead of using an image, I can dynamically control the content that appears on the cards.
	</p>

	<figure>
		<img src="{{ asset('images/deed-css-render.jpg') }}" alt="My faithful reproduction." class="bs-img-responsive">
		<figcaption><strong>Fig. C:</strong> My faithful reproduction.</figcaption>
	</figure>

	<p>
		Comparing my reproduction with the originals, hopefully you agree, the likeness is pretty spot on.
		The only real difference is the discoloring and the wear and tear on the 60 year old original.
	</p>

	<card-holder class="chance-holder">
        <a href="{{ route('deeds') }}" target="_blank" class="card-link">
        	@include('decks.about.deeds')
        </a>

		@include('decks.about.partials.bonus-chance')
	</card-holder>


	<h3>Modern Design</h3>

	<p>To reinforce my opinion that graphic design has lost some character over the years, let’s compare some modern designs.</p>
	<p>First off, a title deed card from my 1990’s European Edition.</p>

	<figure>
		<img src="{{ asset('images/deed-euro1991.jpg') }}" alt="From the European version, 1991." class="bs-img-responsive">
		<figcaption><strong>Fig. D:</strong> From the European version, 1991.</figcaption>
	</figure>

	<p>
		Overall, its looks pretty smart and I don't have any real issues with its appearance.
		It is however, clearly designed on computer, so right away you lose some of the inconsistencies and quirks that give the old cards their character.
		The typeface looks good when bold, but I don't like the light variant.
		There are less ditto marks and less capitalization.
		The information on the card looks more cramped and there is visibly less white space.
		The addition of trade marks and copyrights changes the tone.
		I do enjoy the striking red mortgaged side of the card though.
	</p>

	<p>
		Moving on to my 2010's American version.<br>
		Hard to know where to start with this version.
		The cards have lost all their character and become bland and generic.
	</p>

	<figure>
		<img src="{{ asset('images/deed-usa2011.jpg') }}" alt="From the American version, 2011" class="bs-img-responsive">
		<figcaption><strong>Fig. E:</strong> From the American version, 2011.</figcaption>
	</figure>

	<p>
		Some of the issues include, but are not limited to;
		the color header now has an ugly black border,
		the beautiful dark shade of blue is gone,
		a generic serif typeface reduces the cleanness,
		everything is center justified which might be why the dollar amounts don't line up!,
		all of the ditto marks are gone and
		the mortgaged side is very boring and basic and doesn't even feature any red.
	</p>
	<p>
		Overall, it just looks like it has been thrown together by an intern using Microsoft Word.
		None of the personality of the creator comes through.
	</p>


	<h3>Summary</h3>

	<p>
		Something about that early 1950 graphic design appeals to me greatly.
		I see the same styles in old London Underground signs from the same era.
	</p>
	<p>
		It's sad that with all the modern advancements, we’ve ended up, in my opinion, with an inferior design.
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

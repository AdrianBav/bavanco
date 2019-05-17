<?php

use App\Deck;
use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the home deck of cards
        $deck = Deck::whereName('home')->first();

        $deck->cards()->createMany(
            config('decks.home')
        );

        // Create the default deck of cards
        $deck = Deck::whereName('default')->first();

        $deck->cards()->createMany(
            config('decks.default')
        );
    }
}

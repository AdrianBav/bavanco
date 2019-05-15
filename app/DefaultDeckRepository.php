<?php

namespace App;

use App\Card;

class DefaultDeckRepository
{
    private static $deeds = [
        // Properties
        'old-kent-rd',
        'whitechapel-rd',
        'the-angel-islington',
        'euston-road',
        'pentonville-road',
        'pall-mall',
        'whitehall',
        'northumberld-ave',
        'bow-street',
        'marlborough-st',
        'vine-street',
        'the-strand',
        'fleet-street',
        'trafalgar-square',
        'leicester-square',
        'coventry-street',
        'piccadilly',
        'regent-street',
        'oxford-street',
        'bond-street',
        'park-lane',
        'mayfair',
        // Utilities
        'electric-company',
        'water-works',
        // Stations
        'kings-cross',
        'marylebone',
        'fenchurch-st',
        'liverpool-st',
        // Mortgaged Properties
        'mortgaged-old-kent-rd',
        'mortgaged-the-angel-islington',
        'mortgaged-trafalgar-square',
        'mortgaged-kings-cross',
    ];

     /**
     * Get the property deed cards for the monopoly page.
     *
     * @return array
     */
    public static function getCards()
    {
        // Create an array of Card instances, based on the decks array.
        $cards = [];

        foreach (self::$deeds as $id => $deed) {
            $card = new Card;

            // The 'partial' function in the Card object will
            // use the 'monopoly' property to adjust the site identifier accordingly.
            $card->monopoly = true;
            $card->site_identifier = $deed;

            $cards[] = $card;
        }

        return $cards;
    }
}

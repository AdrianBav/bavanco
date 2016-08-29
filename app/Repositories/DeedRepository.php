<?php

namespace App\Repositories;

use App\Card;

class DeedRepository
{
     /**
     * Get the property deed cards for the monopoly page.
     *
     * @return array
     */
    public function getCards()
    {
        $deeds = [

            // Properties
            'property.old-kent-rd',
            'property.whitechapel-rd',
            'property.the-angel-islington',
            'property.euston-road',
            'property.pentonville-road',
            'property.pall-mall',
            'property.whitehall',
            'property.northumberld-ave',
            'property.bow-street',
            'property.marlborough-st',
            'property.vine-street',
            'property.the-strand',
            'property.fleet-street',
            'property.trafalgar-square',
            'property.leicester-square',
            'property.coventry-street',
            'property.piccadilly',
            'property.regent-street',
            'property.oxford-street',
            'property.bond-street',
            'property.park-lane',
            'property.mayfair',

            // Utilities
            'utility.electric-company',
            'utility.water-works',
        
            // Stations
            'station.kings-cross',
            'station.marylebone',
            'station.fenchurch-st',
            'station.liverpool-st',
            
            // Mortgaged Properties
            'mortgaged.old-kent-rd',
            'mortgaged.the-angel-islington',
            'mortgaged.trafalgar-square',
            'mortgaged.kings-cross',
        ];

        // Create an array of Card instances, based on the decks array.
        $cards = array();

        foreach ($deeds as $id => $deed)
        {
            $card = new Card;

            // The 'partial' function in the Card object will 
            // use the 'monopoly' property to adjust the slug accordingly.
            $card->monopoly = true;
            $card->slug = $deed;

            $cards[] = $card;
        }

        return $cards;
    }     

}

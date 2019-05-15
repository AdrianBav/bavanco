<?php

namespace App;

use App\Card;
use AdrianBav\Traffic\Facades\Traffic;

abstract class CardRepository
{
    /**
     * Get the data used for the given card.
     *
     * @param  Card  $card
     * @return array
     */
	abstract protected function getData(Card $card);

    /**
     * Get the given cards visit statistics.
     *
     * @param  Card  $card
     * @return array
     */
    public function get_visit_statistics(Card $card)
    {
        $visits = Traffic::visits($card->site_identifier);

        return number_format($visits);
    }
}

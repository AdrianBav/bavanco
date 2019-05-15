<?php

namespace App\Repositories\Cards;

use App\Card;
use AdrianBav\Traffic\Facades\Traffic;

trait VisitStatistics
{
    /**
     * Get the given cards visit statistics.
     *
     * @param  Card  $card
     * @return array
     */
    protected function get_visit_statistics(Card $card)
    {
        //$visits = Traffic::visits($card->site_identifier);
        $visits = 99;

        return number_format($visits);
    }
}

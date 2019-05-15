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
        $visits = Traffic::visits($card->site_identifier);

        $data = array(
            'ydt_unique_visits'   => number_format($visits),
            'ydt_visits'          => 0,
            'total_unique_visits' => 0,
            'total_visits'        => 0,
            'days'                => 0,
        );

        return $data;
    }
}

<?php

namespace App\Repositories\Cards;

use App\Card;

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
        $data = array(
            'ydt_unique_visits'   => $card->visits()->ytd()->unique()->get()->count(),
            'ydt_visits'          => $card->visits()->ytd()->get()->count(),
            'total_unique_visits' => $card->visits()->unique()->get()->count(),
            'total_visits'        => $card->visits()->get()->count(),
            'days'                => $card->age(),
        );

        return $data;	
    }

}

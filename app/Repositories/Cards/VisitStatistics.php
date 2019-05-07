<?php

namespace App\Repositories\Cards;

use DB;
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
        $visits = DB::connection('traffic')
            ->table('visits')
            ->join('sites', 'visits.site_id', '=', 'sites.id')
            ->where('sites.slug', $card->site_identifier)
            ->count();

        $data = array(
            'ydt_unique_visits'   => $visits,
            'ydt_visits'          => 0,
            'total_unique_visits' => 0,
            'total_visits'        => 0,
            'days'                => 0,
        );

        return $data;
    }

}

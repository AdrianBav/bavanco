<?php

namespace App\Repositories;

use App\Repositories\Cards\VisitStatistics;
use App\Repositories\Cards\CardRepository;

use App\Card;

class GalleryCardRepository implements CardRepository
{
    use VisitStatistics;

    /**
     * Get the data used for the card.
     *
     * @param  Card  $card
     * @return array
     */ 
	public function getData(Card $card)
	{
        $visit_statistics = $this->get_visit_statistics($card);

        $site_statistics = array(
            'year_span' => date('Y') - 2008,
        );

        $data = array_merge($visit_statistics, $site_statistics);

        return $data;   
	}

}

<?php

namespace App\Repositories;

use App\Card;
use App\Repositories\Cards\CardRepository;
use App\Repositories\Cards\VisitStatistics;

class ArchivesCardRepository implements CardRepository
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
        return [
            'ydt_unique_visits' => $this->get_visit_statistics($card),
            'active_years' => date('Y') - 1999,
            'domains' => 3,
        ];
	}
}

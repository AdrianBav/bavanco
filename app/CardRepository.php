<?php

namespace App;

use App\Card;
use Carbon\Carbon;
use App\Services\SiteMeta;
use AdrianBav\Traffic\Facades\Traffic;

abstract class CardRepository
{
    /**
     * Get the data used for the given card.
     *
     * @return array
     */
	abstract protected function getData();

    /**
     * An instance of the card.
     *
     * @var  App\Card
     */
    protected $card;

    /**
     * Instantiate the card repository.
     *
     * @param   App\Card  $card
     * @return  void
     */
    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    /**
     * Get various date statistics since creation.
     *
     * @return  array
     */
    public function getDaysSince()
    {
        $interval = Carbon::now()->diff($this->card->created_at);

        return [
            'year' => $this->card->created_at->year,
            'years' => $interval->y,
            'months' => $interval->m,
            'weeks' => intval(floor($interval->d / 7)),
            'days' => $interval->d % 7,
            'totalDays' => number_format($interval->days),
        ];
    }

    /**
     * Get the cards site meta data.
     *
     * @return  array
     */
    public function getMetaData()
    {
        $metaData = new SiteMeta($this->card->site_identifier);

        return $metaData->get();
    }

    /**
     * Get the given cards visit statistics.
     *
     * @return integer
     */
    public function getSiteVisits()
    {
        $visits = Traffic::visits($this->card->site_identifier);

        return number_format($visits);
    }
}

<?php

namespace App\CardRepositories;

use Carbon\Carbon;
use App\CardRepository;
use App\WorldTemperatures;

class WorldTemperaturesCardRepository extends CardRepository
{
    /**
     * The cities to fetch temperate for.
     *
     * @var  array
     */
    protected $cities = [
        ['name' => 'dallas', 'lat' => '32.8205865', 'long' => '-96.8714227'],
        ['name' => 'london', 'lat' => '51.5285582', 'long' => '-0.2416797'],
        ['name' => 'melbourne', 'lat' => '-37.971237', 'long' => '144.4926947'],
    ];

    /**
     * Get the data used for the card.
     *
     * @return array
     */
	public function getData()
	{
        $data = [];

        $temperatures = new WorldTemperatures;

        foreach ($this->cities as $city) {
            $temperateInCelsius = $temperatures->fromLatLng($city['name'], $city['lat'], $city['long']);

            $celsius = round($temperateInCelsius);
            $fahrenheit = round(($temperateInCelsius * 1.8) + 32);

            $data["{$city['name']}"] = "{$celsius}/{$fahrenheit}";
        }

        $data['dallas_season'] = $this->currentSeason();

        return $data;
	}

    /**
     * Determine the current season in Dallas.
     *
     * @return  string
     */
    private function currentSeason()
    {
        $now = Carbon::now();

        $spring = Carbon::createFromDate(null, 3, 20);
        $summer = Carbon::createFromDate(null, 6, 21);
        $fall = Carbon::createFromDate(null, 9, 22);
        $winter = Carbon::createFromDate(null, 12, 21);

        if ($now->gte($winter) || $now->lt($spring)) {
            $season = 'Winter';
        } else if ($now->gte($fall)) {
            $season = 'Fall';
        } else if ($now->gte($summer)) {
            $season = 'Summer';
        } else {
            $season = 'Spring';
        }

        return $season;
    }
}

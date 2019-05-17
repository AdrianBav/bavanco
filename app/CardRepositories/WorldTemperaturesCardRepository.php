<?php

namespace App\CardRepositories;

use App\Card;
use Carbon\Carbon;
use App\CardRepository;
use App\WorldTemperatures;

class WorldTemperaturesCardRepository extends CardRepository
{
    /**
     * Get the data used for the card.
     *
     * @param  Card  $card
     * @return array
     */
	public function getData(Card $card)
	{
        $data = array();

        $cities = [
            ['name' => 'dallas', 'lat' => '32.8205865', 'long' => '-96.8714227'],
            ['name' => 'london', 'lat' => '51.5285582', 'long' => '-0.2416797'],
            ['name' => 'melbourne', 'lat' => '-37.971237', 'long' => '144.4926947'],
        ];

        $temperatures = new WorldTemperatures;

        foreach ($cities as $city) {
            $temp_in_c = $temperatures->fromLatLng($city['name'], $city['lat'], $city['long']);

            $celsius = round($temp_in_c);
            $fahrenheit = round(($temp_in_c * 1.8) + 32);

            $data["{$city['name']}"] = "{$celsius}/{$fahrenheit}";
        }

        // Determine the current season in Dallas
        $now = Carbon::now();
        $spring = Carbon::createFromDate(null, 3, 20);
        $summer = Carbon::createFromDate(null, 6, 21);
        $fall = Carbon::createFromDate(null, 9, 22);
        $winter = Carbon::createFromDate(null, 12, 21);

        if ($now->gte($winter) || $now->lt($spring)) {
            $data['dallas_season'] = 'Winter';
        } else if ($now->gte($fall)) {
            $data['dallas_season'] = 'Fall';
        } else if ($now->gte($summer)) {
            $data['dallas_season'] = 'Summer';
        } else {
            $data['dallas_season'] = 'Spring';
        }

        return $data;
	}
}

<?php

namespace App\Repositories;

use App\Repositories\Cards\VisitStatistics;
use App\Repositories\Cards\CardRepository;

use Cache;
use App\Card;
use GuzzleHttp\Client;

class GalleryCardRepository implements CardRepository
{
    use VisitStatistics;

    /**
     * Cache the gallery statistics for 1 day.
     *
     * @var integer
     */
    private $cache_minutes = 1440;

    /**
     * Get the data used for the card.
     *
     * @param  Card  $card
     * @return array
     */
	public function getData(Card $card)
	{
        $visit_statistics = $this->get_visit_statistics($card);

        // Get site statistics
        // $site_statistics = Cache::remember('gallery_statistics', $this->cache_minutes, function() use ($card) {
        //     return $this->get_site_statistics($card->url);
        // });

        $site_statistics = [
            'total_collections' => '10',
            'total_photos' => '351',
        ];

        // Return the card data
        $data = array_merge($visit_statistics, $site_statistics);

        return $data;
	}


    // Private Functions

    /**
     * Get the statistics for the gallery card.
     *
     * @param  string  $card_url
     * @return array
     */
    private function get_site_statistics($card_url)
    {
        // Generate the API statistics URL
        $api_statistics_url = sprintf('%s/statistics', $card_url);

        // Fetch the gallery statistics
        $client = new Client();
        $response = $client->get($api_statistics_url);
        $statistics = $response->json();

        // Package the gallery statistics
        $site_statistics = array(
            'total_collections' => $statistics['total_collections'],
            'total_photos'      => $statistics['total_photos'],
            'duration_in_years' => $statistics['duration_in_years']
        );

        return $site_statistics;
    }

}

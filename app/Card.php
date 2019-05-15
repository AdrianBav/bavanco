<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Card extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_identifier',
        'url',
    ];


    // Accessors & Mutators

    /**
     * Substitute a void url for cards with no link.
     *
     * @param  string  $url
     * @return string
     */
    public function getUrlAttribute($url)
    {
        return ($url) ? $url : 'javascript:void(0)';
    }


    // Public functions

    /**
     * Get the cards view partial.
     *
     * @return string
     */
    public function partial()
    {
        // The monopoly page creates instances of 'Card' with the 'monopoly' property set.
        if ($this->monopoly) {
            return "decks.default.{$this->site_identifier}";
        }

        return "decks.home.{$this->site_identifier}";
    }

    /**
     * Get the data from the cards data repository.
     *
     * @return Array
     */
    public function data()
    {
        $data = array();

        // Build the cards repository name and path from the site_identifier
        $repositoryName = sprintf('%sCardRepository', studly_case($this->site_identifier));
        $cardRepository = sprintf('\\App\\Repositories\\%s', $repositoryName);

        // Card repositories are optional
        if ( ! class_exists($cardRepository)) {
            return $data;
        }

        // Extract the cards data from it's repository
        $repository = new $cardRepository();
    	$data = $repository->getData($this);

    	return $data;
    }

    /**
     * Get the cards link target.
     *
     * @return string
     */
    public function target()
    {
        if (starts_with($this->url, 'http')) {
            return '_blank';
        }

        return '_self';
    }

    /**
     * Get statistics since creation.
     *
     * @return  array
     */
    public function since()
    {
        $interval = Carbon::now()->diff($this->created_at);

        return [
            'year' => $this->created_at->year,
            'years' => $interval->y,
            'months' => $interval->m,
            'weeks' => intval(floor($interval->d / 7)),
            'days' => $interval->d % 7,
            'totalDays' => number_format($interval->days),
        ];
    }
}

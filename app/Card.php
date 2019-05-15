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
        'site_identifier', 'url',
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
        $deck = ($this->monopoly) ? 'default' : 'home';

        return "decks.{$deck}.{$this->site_identifier}";
    }

    /**
     * Get the data from the cards data repository.
     *
     * @return Array
     */
    public function data()
    {
        $data = [];

        $repositoryName = sprintf('%sCardRepository', studly_case($this->site_identifier));
        $cardRepository = sprintf('\\App\\CardRepositories\\%s', $repositoryName);

        if (! class_exists($cardRepository)) {
            return $data;
        }

    	return (new $cardRepository)->getData($this);
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

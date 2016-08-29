<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class Card extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_identifier', 'url',
        'created_at'    // temp!!
    ];


    // Relationships

    /**
     * Get the number of visits of this card.
     */
    public function visits()
    {
        return $this->hasMany('App\Visit');
    }


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
        if ($this->monopoly)
        {
            return "deeds.{$this->site_identifier}";            
        }

        return "deeds.custom.{$this->site_identifier}";
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
        if ( ! class_exists($cardRepository)) 
        {
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
        if (starts_with($this->url, 'http')) 
        {
            return '_blank';
        }

        return '_self';
    }    

    /**
     * Return the number of days since the cards creation.
     *
     * @return integer
     */
    public function age()
    {
        return $this->created_at->diffInDays();    
    }


    // Public static functions

    /**
     * Determine where this card ranks based on total number of visits.
     *
     * @return string
     */
    public static function rankings() 
    {
        // Get all cards in order of total visits
        $results_collection = DB::table('cards')
            ->leftJoin('visits', 'cards.id', '=', 'visits.card_id')
            ->select('cards.id AS card_id')
            ->addSelect(DB::raw('COUNT(visits.card_id) as total'))
            ->groupBy('cards.id')
            ->orderBy('total', 'desc')
            ->orderBy('cards.created_at', 'asc')
            ->get();

        // Transform the results collection to produce and array
        // where the key is the card id and the value is the rank
        $ranks = $results_collection
            ->pluck('card_id')
            ->prepend(0)
            ->flip()
            ->forget(0)
            ->transform(function ($item, $key) {
                return static::ordinal($item);
            })
            ->all();

        return $ranks;
    }


    // Private static functions

    /**
     * Append an ordinal suffix to the given number.
     *
     * @param  integer $number
     * @return string
     */
    private static function ordinal($number) 
    {
        // For numbers ending 0 to 9
        $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
                
        if ((($number % 100) >= 11) && (($number % 100) <= 13))
        {
            // 11, 12 and 13 are exceptions to the rule
            return $number . 'th';
        }
        else
        {
            // Use the last digit to determine which ending the number should use
            return $number . $ends[$number % 10];
        }
    }    

}

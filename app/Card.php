<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
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


    // Eloquent Relationships

    /**
     * Get the post that owns the comment.
     */
    public function deck()
    {
        return $this->belongsTo(Deck::class);
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
        if (is_null($url)) {
            return 'javascript:void(0)';
        }

        if (App::environment('local')) {
            $url = local_url($url);
        }

        return $url;
    }

    /**
     * Get the cards link target.
     *
     * @return string
     */
    public function getTargetAttribute()
    {
        return ($this->isExternalLink())
            ? '_blank'
            : '_self';
    }

    /**
     * Determine if the link points to an external site.
     *
     * @return  boolean
     */
    private function isExternalLink()
    {
        return starts_with($this->url, 'http');
    }

    /**
     * Get the cards view partial.
     *
     * @return string
     */
    public function getPartialAttribute()
    {
        $cacheKey = sprintf('%s-partial', $this->site_identifier);

        return Cache::rememberForever($cacheKey, function () {
            return "decks.{$this->deck->name}.{$this->site_identifier}";
        });
    }


    // Public functions

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

    	return (new $cardRepository($this))->getData();
    }
}

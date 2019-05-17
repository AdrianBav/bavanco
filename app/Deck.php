<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the cards for the deck.
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}

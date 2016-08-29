<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitAgent extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];


    // Relationships

    /**
     * Get the number of visits of this card.
     */
    public function visits()
    {
        return $this->hasMany('App\Visit');
    }

}

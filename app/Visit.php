<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Visit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'card_id', 'visit_ip_id', 'visit_agent_id'
    ];


    // Relationships

    /**
     * Get the card that was visited.
     */
    public function card()
    {
        return $this->belongsTo('App\Card');
    }

    /**
     * Get the ip of the visiter.
     */
    public function ip()
    {
        return $this->belongsTo('App\VisitIp');
    }

    /**
     * Get the agent of the visiter.
     */
    public function agent()
    {
        return $this->belongsTo('App\VisitAgent');
    }        


    // Query Scopes

    /**
     * Scope a query to only include visits from this year.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeYtd($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->startOfYear());
    } 

    /**
     * Scope a query to only include unique visits.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnique($query)
    {
        return $query->select('card_id', 'visit_ip_id', 'visit_agent_id')->groupBy('card_id', 'visit_ip_id', 'visit_agent_id');
    }

}

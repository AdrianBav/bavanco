<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Jenssegers\Agent\Agent;

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


    // Public functions

    /**
     * Decode the User agent.
     *
     * @return VisitAgent
     */  
    public function decode()
    {
        // Decode the User Agent string
        $agent = new Agent();
        $agent->setUserAgent($this->user_agent);

        // Get platform and browser versions
        $platform = $agent->platform();
        $browser = $agent->browser();    

        $this->device           = $agent->device();
        $this->platform         = $platform;
        $this->platform_version = $agent->version($platform);
        $this->browser          = $browser;
        $this->browser_version  = $agent->version($browser);
        $this->isDesktop        = $agent->isDesktop();
        $this->isTablet         = $agent->isTablet();
        $this->isPhone          = $agent->isPhone();
        $this->isRobot          = $agent->isRobot();
        $this->robot            = $agent->robot();
        
        $this->save();
        
        return $this;
    }

}

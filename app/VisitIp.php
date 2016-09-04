<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use GeoIP;

class VisitIp extends Model
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
     * Decode the IP address.
     *
     * @return VisitIp
     */  
    public function decode()
    {
        // Decode the IP
        $location = GeoIP::getLocation($this->ip_address);

        $this->isoCode     = $location['isoCode'];
        $this->country     = $location['country'];
        $this->city        = $location['city'];
        $this->state       = $location['state'];
        $this->postal_code = $location['postal_code'];
        $this->lat         = $location['lat'];
        $this->lon         = $location['lon'];
        $this->timezone    = $location['timezone'];
        $this->continent   = $location['continent'];        

        $this->save();

        return $this;
    }    

}

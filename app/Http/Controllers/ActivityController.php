<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Validator;
use App\Card;
use App\Visit;
use App\VisitIp;
use App\VisitAgent;
use GeoIP;
use Jenssegers\Agent\Agent;

class ActivityController extends Controller
{
    /**
     * Record the given activity.
     *
     * @param  Request $request
     * @return Response
     */    
    public function record(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_identifier' => 'required',
            'ip_address'      => 'required',
            'user_agent'      => 'required'
        ]);

        if ($validator->fails()) 
        {
            return response('Missing parameters.', 422);
        }

        // Get the parameters posted to this api endpoint
        $site_identifier = $request->input('site_identifier');
        $ip_address = $request->input('ip_address');
        $user_agent = $request->input('user_agent');

        $card = Card::where('site_identifier', $site_identifier)->first();
        $visit_ip = $this->get_visit_ip($ip_address);
		$visit_agent = $this->get_visit_agent($user_agent);

		Visit::create([
	        'card_id' 		 => $card->id,
	        'visit_ip_id' 	 => $visit_ip->id,
	        'visit_agent_id' => $visit_agent->id,
        ]);

    	return response('The activity has been recorded successfully!', 201);
    }


    // Private functions

    /**
     * Decode the given IP address.
     *
     * @param  String $ip_address
     * @return VisitIp
     */  
    private function get_visit_ip($ip_address)
    {
		// Retrieve the visit_ip by the attributes, or instantiate a new instance...
		$visit_ip = VisitIp::firstOrNew(['ip_address' => $ip_address]);

		if ($visit_ip->exists) 
		{
			return $visit_ip;
		}

	    // Decode the IP
	    $location = GeoIP::getLocation($ip_address);

        $visit_ip->isoCode     = $location['isoCode'];
        $visit_ip->country     = $location['country'];
        $visit_ip->city        = $location['city'];
        $visit_ip->state       = $location['state'];
        $visit_ip->postal_code = $location['postal_code'];
        $visit_ip->lat         = $location['lat'];
        $visit_ip->lon         = $location['lon'];
        $visit_ip->timezone    = $location['timezone'];
        $visit_ip->continent   = $location['continent'];	    

        $visit_ip->save();

        return $visit_ip;
    }

    /**
     * Decode the given User agent.
     *
     * @param  String $user_agent
     * @return VisitAgent
     */  
    private function get_visit_agent($user_agent)
    {
		// Retrieve the visit_agent by the attributes, or instantiate a new instance
		$visit_agent = VisitAgent::firstOrNew(['user_agent' => $user_agent]);

		if ($visit_agent->exists) 
		{
			return $visit_agent;
		}

	    // Decode the User Agent string
	    $agent = new Agent();
	    $agent->setUserAgent($visit_agent);

	    // Get platform and browser versions
	    $platform = $agent->platform();
	    $browser = $agent->browser();    

        $visit_agent->device           = $agent->device();
        $visit_agent->platform         = $platform;
        $visit_agent->platform_version = $agent->version($platform);
        $visit_agent->browser          = $browser;
        $visit_agent->browser_version  = $agent->version($browser);
        $visit_agent->isDesktop        = $agent->isDesktop();
        $visit_agent->isTablet         = $agent->isTablet();
        $visit_agent->isPhone          = $agent->isPhone();
        $visit_agent->isRobot          = $agent->isRobot();
        $visit_agent->robot            = $agent->robot();
	    
	    $visit_agent->save();
		
		return $visit_agent;
    }

}

<?php

namespace App\Listeners;

use App\Events\ActivityReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Card;
use App\Visit;
use App\VisitIp;
use App\VisitAgent;

class RecordActivity implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ActivityReceived  $event
     * @return void
     */
    public function handle(ActivityReceived $event)
    {
        $card = Card::where('site_identifier', $event->site_identifier)->first();
        $visit_ip = $this->get_visit_ip($event->ip_address);
        $visit_agent = $this->get_visit_agent($event->user_agent);

        Visit::create([
            'card_id'        => $card->id,
            'visit_ip_id'    => $visit_ip->id,
            'visit_agent_id' => $visit_agent->id,
        ]);
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
        $visit_ip->decode();

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
        
        // Decode the User Agent
        $visit_agent->decode();
        
        return $visit_agent;
    }

}

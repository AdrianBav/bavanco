<?php

namespace App\Console\Commands;

use Jenssegers\Agent\Agent;

class UserAgentDetails
{
    /**
     * An instance of the user agent decoder.
     *
     * @var  \Jenssegers\Agent\Agent;
     */
    protected $agent;

    /**
     * Instantiate the UserAgentDetails class.
     */
    public function __construct()
    {
        $this->agent = new Agent;
    }

    /**
     * Get user agent details.
     *
     * @param   string  $userAgent
     * @return  array
     */
    public function getDetails($userAgent)
    {
        $this->agent->setUserAgent($userAgent);

        $browser = $this->agent->browser();
        $platform = $this->agent->platform();
        $device = $this->getDevice($this->agent);

        return [
            'browser' => $browser ?: null,
            'browser_version' => $this->agent->version($browser) ?: null,

            'platform' => $platform ?: null,
            'platform_version' => $this->agent->version($platform) ?: null,

            'device' => $device,
            'device_type' => $this->agent->device() ?: null,
        ];
    }

    /**
     * Get the device type.
     *
     * @param   Agent  $agent
     * @return  string
     */
    private function getDevice(Agent $agent)
    {
        if ($agent->isDesktop()) {
            return 'Desktop';
        }

        if ($agent->isTablet()) {
            return 'Tablet';
        }

        if ($agent->isPhone()) {
            return 'Phone';
        }

        return null;
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\IpAddressDetails;
use App\Services\UserAgentDetails;
use Illuminate\Support\Facades\DB;
use App\Services\TrafficStatisticsService;

class RefreshDashboardStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'traffic:dashboard-refresh {--fresh : Truncate old data before refresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh dashboard statistics';

    /**
     * Traffic statistics service.
     *
     * @var  \App\Services\TrafficStatisticsService
     */
    protected $statistics;

    /**
     * Holds the number of new IPs since the last refresh.
     *
     * @var  integer
     */
    protected $refreshedIps;

    /**
     * Holds the number of new agents since the last refresh.
     *
     * @var  integer
     */
    protected $refreshedAgents;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TrafficStatisticsService $trafficStatistics)
    {
        parent::__construct();

        $this->statistics = $trafficStatistics;

        $this->refreshedIps = 0;
        $this->refreshedAgents = 0;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('fresh')) {
            $this->truncateDetailsTables();
        }

        $this->refreshIps();
        $this->refreshAgents();

        $this->info("Refreshed {$this->refreshedIps} IP(s) and {$this->refreshedAgents} agent(s).");
    }

    /**
     * Truncate the *_details tables.
     *
     * @return  void
     */
    private function truncateDetailsTables()
    {
        DB::table('ip_details')->truncate();
        DB::table('agent_details')->truncate();

        $this->info('Truncated details tables.');
    }

    /**
     * Refresh the IP addresses details table.
     *
     * @return  void
     */
    private function refreshIps()
    {
        $ipAddressDetails = new IpAddressDetails;

        $this->newIps()->each(function ($ip) use ($ipAddressDetails) {
            $ipDetails = $ipAddressDetails->getDetails($ip->address);

            DB::table('ip_details')->insert([
                'id' => $ip->id,
                'address' => $ip->address,
                'city' => $ipDetails->city,
                'state_prov' => $ipDetails->state_prov,
                'zipcode' => $ipDetails->zipcode,
                'country_name' => $ipDetails->country_name,
                'country_flag' => $ipDetails->country_flag,
                'continent_name' => $ipDetails->continent_name,
            ]);
        });
    }

    /**
     * Refresh the user agents details table.
     *
     * @return  void
     */
    private function refreshAgents()
    {
        $userAgentDetails = new UserAgentDetails;

        $this->newAgents()->each(function ($agent) use ($userAgentDetails) {
            $agentDetails = $userAgentDetails->getDetails($agent->name);

            DB::table('agent_details')->insert([
                'id' => $agent->id,
                'name' => $agent->name,
                'browser' => $agentDetails['browser'],
                'browser_version' => $agentDetails['browser_version'],
                'platform' => $agentDetails['platform'],
                'platform_version' => $agentDetails['platform_version'],
                'device' => $agentDetails['device'],
                'device_type' => $agentDetails['device_type'],
            ]);
        });
    }

    /**
     * Get any new IPs since the last refresh.
     *
     * @return  Collection
     */
    private function newIps()
    {
        $ips = $this->statistics->getNewIps();

        $this->refreshedIps = $ips->count();

        return $ips;
    }

    /**
     * Get any new agents since the last refresh.
     *
     * @return  Collection
     */
    private function newAgents()
    {
        $agents = $this->statistics->getNewAgents();

        $this->refreshedAgents = $agents->count();

        return $agents;
    }
}

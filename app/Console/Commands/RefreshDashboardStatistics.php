<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\IpAddressDetails;
use App\Services\UserAgentDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createDetailsTables();

        if ($this->option('fresh')) {
            $this->truncateDetailsTables();
        }

        $this->refreshIps();
        $this->refreshAgents();

        $this->info('Done.');
    }

    /**
     * Create the *_details tables if they don't already exist.
     *
     * @return  void
     */
    private function createDetailsTables()
    {
        $runMigrations =
            ! Schema::connection('traffic')->hasTable('ip_details') ||
            ! Schema::connection('traffic')->hasTable('agent_details');

        if ($runMigrations) {
            $this->call('migrate', [
                '--database' => 'traffic',
                '--path' => 'database/migrations/dashboard',
            ]);
        }
    }

    /**
     * Truncate the *_details tables.
     *
     * @return  void
     */
    private function truncateDetailsTables()
    {
        DB::connection('traffic')->table('ip_details')->truncate();
        DB::connection('traffic')->table('agent_details')->truncate();

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

        $this->getNewIps()->each(function ($ip) use ($ipAddressDetails) {
            $ipDetails = $ipAddressDetails->getDetails($ip->address);

            DB::connection('traffic')->table('ip_details')->insert([
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

        $this->getNewAgents()->each(function ($agent) use ($userAgentDetails) {
            $agentDetails = $userAgentDetails->getDetails($agent->name);

            DB::connection('traffic')->table('agent_details')->insert([
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
    private function getNewIps()
    {
        return DB::connection('traffic')
            ->table('ips')
            ->leftJoin('ip_details', 'ips.address', '=', 'ip_details.address')
            ->select('ips.*')
            ->whereNull('ip_details.address')
            ->get();
    }

    /**
     * Get any new agents since the last refresh.
     *
     * @return  Collection
     */
    private function getNewAgents()
    {
        return DB::connection('traffic')
            ->table('agents')
            ->leftJoin('agent_details', 'agents.name', '=', 'agent_details.name')
            ->select('agents.*')
            ->whereNull('agent_details.name')
            ->get();
    }
}

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

            // TODO - delete
            $this->seedDummyData();
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


    // TODO - DELETE
    private function seedDummyData()
    {
        DB::connection('traffic')->table('ips')->insert([
            ['address' => '8.8.8.8'],
            ['address' => '109.133.32.252'],
            ['address' => '109.122.32.252'],
            ['address' => '109.111.32.252'],
        ]);
        DB::connection('traffic')->table('agents')->insert([
            ['name' => 'Mozilla/5.0 (Windows CE) AppleWebKit/5350 (KHTML, like Gecko) Chrome/13.0.888.0 Safari/5350'],
            ['name' => 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_5) AppleWebKit/5312 (KHTML, like Gecko) Chrome/14.0.894.0 Safari/5312'],
            ['name' => 'Mozilla/5.0 (X11; Linuxi686; rv:7.0) Gecko/20101231 Firefox/3.6'],
            ['name' => 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_7_1 rv:3.0; en-US) AppleWebKit/534.11.3 (KHTML, like Gecko) Version/4.0 Safari/534.11.3'],
            ['name' => 'Opera/8.25 (Windows NT 5.1; en-US) Presto/2.9.188 Version/10.00'],
            ['name' => 'Mozilla/5.0 (compatible; MSIE 7.0; Windows 98; Win 9x 4.90; Trident/3.0)'],
            ['name' => 'Mozilla/5.0 (Linux; Android 6.0; HTC One X10 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/61.0.3163.98 Mobile Safari/537.36'],
            ['name' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0 Mobile/15E148 Safari/604.1'],
            ['name' => 'Mozilla/5.0 (Linux; Android 7.0; Pixel C Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/52.0.2743.98 Safari/537.36'],
            ['name' => 'Mozilla/5.0 (Linux; Android 4.4.3; KFTHWI Build/KTU84M) AppleWebKit/537.36 (KHTML, like Gecko) Silk/47.1.79 like Chrome/47.0.2526.80 Safari/537.36'],
            ['name' => 'Mozilla/5.0 (Nintendo WiiU) AppleWebKit/536.30 (KHTML, like Gecko) NX/3.0.4.2.12 NintendoBrowser/4.3.1.11264.US'],
        ]);
    }
}

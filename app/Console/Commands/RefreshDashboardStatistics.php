<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RefreshDashboardStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'traffic:dashboard-refresh';

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

    //
    private function refreshIps()
    {
        $newIps = DB::connection('traffic')
            ->table('ips')
            ->leftJoin('ip_details', 'ips.address', '=', 'ip_details.address')
            ->select('ips.*')
            ->whereNull('ip_details.address')
            ->get();

        foreach ($newIps as $ip) {
            $location = 'somewhere';    // lookup from $ip->address

            DB::connection('traffic')->table('ip_details')->insert([
                'id' => $ip->id,
                'address' => $ip->address,

                'location' => $location,
            ]);
        }
    }

    //
    private function refreshAgents()
    {
        $newAgents = DB::connection('traffic')
            ->table('agents')
            ->leftJoin('agent_details', 'agents.name', '=', 'agent_details.name')
            ->select('agents.*')
            ->whereNull('agent_details.name')
            ->get();

        foreach ($newAgents as $agent) {
            $device = 'computer';    // lookup from $agent->name

            DB::connection('traffic')->table('agent_details')->insert([
                'id' => $agent->id,
                'name' => $agent->name,

                'device' => $device,
            ]);
        }
    }
}

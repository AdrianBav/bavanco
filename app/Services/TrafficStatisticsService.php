<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class TrafficStatisticsService
{
    // TODO
    private $colors = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
    ];

    /**
     * Get any new IPs since the last refresh.
     *
     * @return  Collection
     */
    public function getNewIps()
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
    public function getNewAgents()
    {
        return DB::connection('traffic')
            ->table('agents')
            ->leftJoin('agent_details', 'agents.name', '=', 'agent_details.name')
            ->select('agents.*')
            ->whereNull('agent_details.name')
            ->get();
    }

    /**
     * Get site statistics.
     *
     * @return  Collection
     */
    public function sites()
    {
        return DB::connection('traffic')
            ->table('visits')
            ->join('sites', 'visits.site_id', '=', 'sites.id')
            ->select('sites.slug AS slug')->selectRaw('COUNT(*) AS visits')->selectRaw('SUM(robots) AS robots')
            ->groupBy('slug')
            ->orderByDesc('visits')
            ->get();
    }

    /**
     * Get a list of the top 10 IPs by country.
     *
     * @return  Collection
     */
    public function top10Ips()
    {
        return DB::connection('traffic')
            ->table('visits')
            ->join('ip_details', 'visits.ip_id', '=', 'ip_details.id')
            ->select('ip_details.country_name AS country')->selectRaw('COUNT(*) AS total')
            ->groupBy('country')
            ->orderByDesc('total')
            ->take(10)
            ->get();
    }

    /**
     * Get the platform share, formatted for a pie chart.
     *
     * @return  array
     */
    public function browserShareChart()
    {
        $browserShare = $this->getAgentShareBy('browser');

        return $this->AgentShareChart($browserShare);
    }

    /**
     * Get the platform share, formatted for a pie chart.
     *
     * @return  array
     */
    public function platformShareChart()
    {
        $platformShare = $this->getAgentShareBy('platform');

        return $this->AgentShareChart($platformShare);
    }

    /**
     * Get the device share, formatted for a pie chart.
     *
     * @return  array
     */
    public function deviceShareChart()
    {
        $deviceShare = $this->getAgentShareBy('device');

        return $this->AgentShareChart($deviceShare);
    }

    /**
     * Get the agent share by the given column.
     *
     * @param   string  $column
     * @return  Collection
     */
    private function getAgentShareBy($column = 'device')
    {
        return DB::connection('traffic')
            ->table('visits')
            ->join('agent_details', 'visits.agent_id', '=', 'agent_details.id')
            ->select("agent_details.{$column} AS label")->selectRaw('COUNT(*) AS total')
            ->groupBy('label')
            ->orderByDesc('total')
            ->get();
    }

    /**
     * Get the agent share, formatted for a pie chart.
     *
     * @param   Collection  $share
     * @return  array
     */
    private function AgentShareChart($share)
    {
        return [
            'datasets' => [
                [
                    'backgroundColor' => $this->colors,
                    'data' => $share->pluck('total'),
                ],
            ],
            'labels' => $share->pluck('label'),
        ];
    }
}

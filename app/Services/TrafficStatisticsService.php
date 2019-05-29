<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class TrafficStatisticsService
{
    /**
     * Create the *_details tables if they don't already exist.
     *
     * @return  void
     */
    public function createDetailsTablesIfNotExist()
    {
        $runMigrations =
            ! Schema::connection('traffic')->hasTable('ip_details') ||
            ! Schema::connection('traffic')->hasTable('agent_details');

        if ($runMigrations) {
            Artisan::call('migrate', [
                '--database' => 'traffic',
                '--path' => 'database/migrations/dashboard',
            ]);
        }
    }

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
            ->select('sites.slug AS slug')
            ->selectRaw('COUNT(*) AS visits')
            ->selectRaw('SUM(robots) AS robots')
            ->groupBy('slug')
            ->orderByDesc('visits')
            ->get()
            ->map(function($site) {
                $site->visits = number_format($site->visits);
                $site->robots = number_format($site->robots);

                return $site;
            });
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
            ->select('ip_details.country_name AS country')
            ->addSelect('ip_details.country_flag AS flag')
            ->selectRaw('COUNT(*) AS total')
            ->groupBy('country')
            ->orderByDesc('total')
            ->take(10)
            ->get()
            ->map(function($ip) {
                $ip->total = number_format($ip->total);

                return $ip;
            });
    }

    /**
     * Get the browser share, formatted for a pie chart.
     *
     * @return  array
     */
    public function browserShareChart()
    {
        $browserShare = $this->getAgentShareBy('browser');

        $data = $browserShare->map(function ($browser) {
            return [
                'name' => $browser->label,
                'y' => (int) $browser->total,
                'drilldown' => $browser->label,
            ];
        });

        $drilldownSeries = $data->map(function ($browser) {
            $version = $this->getBrowserVersionShare($browser['name']);

            return [
                'name' => $browser['name'],
                'id' => $browser['name'],
                'data' => $version,
            ];
        });

        return $this->chartStructure('Browser Share', $data, $drilldownSeries);
    }

    /**
     * Get the platform share, formatted for a pie chart.
     *
     * @return  array
     */
    public function platformShareChart()
    {
        $platformShare = $this->getAgentShareBy('platform');

        $data = $platformShare->map(function ($platform) {
            return [
                'name' => $platform->label,
                'y' => (int) $platform->total,
                'drilldown' => $platform->label,
            ];
        });

        $drilldownSeries = $data->map(function ($platform) {
            $version = $this->getPlatformVersionShare($platform['name']);

            return [
                'name' => $platform['name'],
                'id' => $platform['name'],
                'data' => $version,
            ];
        });

        return $this->chartStructure('Platform Share', $data, $drilldownSeries);
    }

    /**
     * Get the device share, formatted for a pie chart.
     *
     * @return  array
     */
    public function deviceShareChart()
    {
        $deviceShare = $this->getAgentShareBy('device');

        $data = $deviceShare->map(function ($device) {
            return [
                'name' => $device->label,
                'y' => (int) $device->total,
                'drilldown' => $device->label,
            ];
        });

        $drilldownSeries = $data->map(function ($device) {
            $version = $this->getDeviceVersionShare($device['name']);

            return [
                'name' => $device['name'],
                'id' => $device['name'],
                'data' => $version,
            ];
        });

        return $this->chartStructure('Device Share', $data, $drilldownSeries);
    }

    /**
     * Get the browser version share.
     *
     * @param   string  $browserName
     * @return  Collection
     */
    private function getBrowserVersionShare($browserName)
    {
        $filter = ['browser', $browserName];

        return $this->getAgentShareBy('browser_version', $filter)
            ->map(function ($browser) {
                return [
                    $browser->label,
                    (int) $browser->total,
                ];
            });
    }

    /**
     * Get the platform version share.
     *
     * @param   string  $platformName
     * @return  Collection
     */
    private function getPlatformVersionShare($platformName)
    {
        $filter = ['platform', $platformName];

        return $this->getAgentShareBy('platform_version', $filter)
            ->map(function ($browser) {
                return [
                    $browser->label,
                    (int) $browser->total,
                ];
            });
    }

    /**
     * Get the device version share.
     *
     * @param   string  $deviceName
     * @return  Collection
     */
    private function getDeviceVersionShare($deviceName)
    {
        $filter = ['device', $deviceName];

        return $this->getAgentShareBy('device_type', $filter)
            ->map(function ($browser) {
                return [
                    $browser->label,
                    (int) $browser->total,
                ];
            });
    }

    /**
     * Get the agent share by the given column.
     *
     * @param   string  $column
     * @return  Collection
     */
    private function getAgentShareBy($column, $filter = [])
    {
        return DB::connection('traffic')
            ->table('visits')
            ->join('agent_details', 'visits.agent_id', '=', 'agent_details.id')
            ->select("agent_details.{$column} AS label")
            ->selectRaw('COUNT(*) AS total')
            ->when($filter, function ($query, $filter) {
                return $query->where($filter[0], $filter[1]);
            })
            ->groupBy('label')
            ->orderByDesc('total')
            ->get();
    }

    /**
     * Build the chart structure.
     *
     * @param   string  $title
     * @param   array   $data
     * @param   array   $drilldownSeries
     * @return  array
     */
    private function chartStructure($title, $data, $drilldownSeries)
    {
        return [
            'chart' => ['type' => 'pie'],
            'title' => ['text' => $title],
            'subtitle' => ['text' => 'Click the slices to view versions.'],
            'plotOptions' => [
                'series' => [
                    'dataLabels' => [
                        'enabled' => true,
                        'format' => '{point.name}: {percentage:.1f}%',
                    ],
                ],
            ],
            'tooltip' => [
                'headerFormat' => '<span style="font-size:11px">Share</span><br>',
                'pointFormat' => '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>',
            ],
            'series' => [
                [
                    'colorByPoint' => true,
                    'data' => $data,
                ],
            ],
            'drilldown' => [
                'series' => $drilldownSeries,
            ],
        ];
    }
}

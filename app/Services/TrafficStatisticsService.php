<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class TrafficStatisticsService
{
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

    //
    public function sampleChartData()
    {
        $ips = $this->top10Ips();

        return [
            'datasets' => [
                [
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    'data' => $ips->pluck('total'),
                ],
            ],
            'labels' => $ips->pluck('country'),
        ];
    }
}

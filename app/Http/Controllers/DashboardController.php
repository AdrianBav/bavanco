<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use App\Services\TrafficStatisticsService;

class DashboardController extends Controller
{
    /**
     * An instance of TrafficStatisticsService.
     *
     * @var  \App\Services\TrafficStatisticsService
     */
    protected $statistics;

    /**
     * Instantiate an instance of the DashboardController.
     *
     * @param  \App\Services\TrafficStatisticsService  $trafficStatistics
     */
    public function __construct(TrafficStatisticsService $trafficStatistics)
    {
        $this->statistics = $trafficStatistics;
    }

    /**
     * Show the traffic statistics.
     *
     * @return View
     */
    public function index()
    {
        $this->statistics->createDetailsTablesIfNotExist();

        return view('dashboard.index');
    }

    /**
     * Refresh the dashboard database tables.
     *
     * @return Response
     */
    public function refresh()
    {
        Artisan::call('traffic:dashboard-refresh');

        return back();
    }
}

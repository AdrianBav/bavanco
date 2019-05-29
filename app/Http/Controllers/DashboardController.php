<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use App\Services\TrafficStatisticsService;

class DashboardController extends Controller
{
    /**
     * Show the traffic statistics.
     *
     * @return View
     */
    public function index()
    {
        TrafficStatisticsService::createDetailsTablesIfNotExist();

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

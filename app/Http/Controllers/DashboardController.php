<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * [index description]
     *
     * @return  [type]
     */
    public function index()
    {
        $sites = DB::connection('traffic')
            ->table('visits')
            ->join('sites', 'visits.site_id', '=', 'sites.id')
            ->select('slug')->selectRaw('COUNT(*) AS visits')->selectRaw('SUM(robots) AS robots')
            ->groupBy('slug')
            ->orderByDesc('visits')
            ->get();

        return view('dashboard.index', compact('sites'));
    }
}

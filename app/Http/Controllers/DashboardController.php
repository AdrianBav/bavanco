<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Show the traffic statistics.
     *
     * @return View
     */
    public function index()
    {
        return view('dashboard.index');
    }
}

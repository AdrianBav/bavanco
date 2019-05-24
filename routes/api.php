<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// temp...
Route::get('ips', function() {
    $ips = \Illuminate\Support\Facades\DB::connection('traffic')->table('ips')->get();

    return $ips;
});

Route::get('ip_details', function() {
    $ips = \Illuminate\Support\Facades\DB::connection('traffic')->table('ip_details')->get();

    return $ips;
});

Route::get('agents', function() {
    $agents = \Illuminate\Support\Facades\DB::connection('traffic')->table('agents')->get();

    return $agents;
});

Route::get('agent_details', function() {
    $agents = \Illuminate\Support\Facades\DB::connection('traffic')->table('agent_details')->get();

    return $agents;
});

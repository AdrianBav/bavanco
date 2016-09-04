<?php

use Jenssegers\Agent\Agent;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// Visit IPs
$factory->define(App\VisitIp::class, function (Faker\Generator $faker) {

    // Decode the IP
    $location = GeoIP::getLocation($faker->ipv4);

    return [
        'ip_address'  => $faker->ipv4,
        'isoCode'     => $location['isoCode'],
        'country'     => $location['country'],
        'city'        => $location['city'],
        'state'       => $location['state'],
        'postal_code' => $location['postal_code'],
        'lat'         => $location['lat'],
        'lon'         => $location['lon'],
        'timezone'    => $location['timezone'],
        'continent'   => $location['continent'],
    ];
});

// Visit Agents
$factory->define(App\VisitAgent::class, function (Faker\Generator $faker) {

    // Generate a User Agent string
    $userAgent = $faker->userAgent;

    // Decode the User Agent string
    $agent = new Agent();
    $agent->setUserAgent($userAgent);

    // Get platform and browser versions
    $platform = $agent->platform();
    $browser = $agent->browser();    

    return [
        'user_agent'       => $userAgent,
        'device'           => $agent->device(),
        'platform'         => $platform,
        'platform_version' => $agent->version($platform),
        'browser'          => $browser,
        'browser_version'  => $agent->version($browser),
        'isDesktop'        => $agent->isDesktop(),
        'isTablet'         => $agent->isTablet(),
        'isPhone'          => $agent->isPhone(),
        'isRobot'          => $agent->isRobot(),
        'robot'            => $agent->robot(),
    ];
});

// Visits
$factory->define(App\Visit::class, function ($faker) {

    // Get a Visit IP
    if (App\VisitIp::count() > 3 && $faker->boolean) 
    {
        $visit_ip_id = App\VisitIp::all()->random(1)->id;
    }
    else
    {
        $visit_ip_id = factory(App\VisitIp::class)->create()->id;
    }

    // Get a Visit Agent
    if (App\VisitAgent::count() > 3 && $faker->boolean) 
    {
        $visit_agent_id = App\VisitAgent::all()->random(1)->id;
    }
    else
    {
        $visit_agent_id = factory(App\VisitAgent::class)->create()->id;
    }    

    return [
        'card_id' => App\Card::all()->random(1)->id,
        'visit_ip_id' => $visit_ip_id,
        'visit_agent_id' => $visit_agent_id,
        'created_at' => $faker->dateTimeThisYear(),
    ];
});

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | TLDs
    |--------------------------------------------------------------------------
    |
    | Define a top level domains for each site for both the production and
    | local environment. When viewed locally, a helper will switch out
    | the production TLD for the local one.
    |
    */

    'blog' => [
        'prod' => '.co.uk',
        'local' => '.local:8003',
    ],

    'travelography' => [
        'prod' => '.co.uk',
        'local' => '.local:8004',
    ],

    'myrhdb' => [
        'prod' => '.co.uk',
        'local' => '.local:8005',
    ],

    'archives' => [
        'prod' => '.co.uk',
        'local' => '.local:8002',
    ],

    'sites' => [
        'prod' => '.com',
        'local' => '.local:8102',
    ],

];

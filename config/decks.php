<?php

use Carbon\Carbon;

return [

    /*
    |--------------------------------------------------------------------------
    | Home Deck
    |--------------------------------------------------------------------------
    |
    | The home deck contians all the cards that should appear on the home
    | page. Identifiers must be unique. URLs are optional. The created
    | at timestamp is only used on deed cards, but usefull for all.
    |
    */

    'home' => [
        [
            'site_identifier' => 'blog',
            'url' => 'https://blog.bavanco.co.uk',
            'created_at' => Carbon::createFromDate(2019, 5, 2)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'travel',
            'url' => 'https://travel.bavanco.co.uk',
            'created_at' => Carbon::createFromDate(2017, 11, 30)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'about-website',
            'url' => '/about',
            'created_at' => Carbon::createFromDate(2015, 11, 3)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'kittyscampers',
            'url' => 'https://archives.bavanco.co.uk/storage/kittyscampers/',
            'created_at' => Carbon::createFromDate(2009, 1, 1)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'screaming-bears-under-construction',
            'url' => 'https://archives.bavanco.co.uk/storage/screamingbears/underconstruction/',
            'created_at' => Carbon::createFromDate(1999, 1, 1)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'bavanco-version-2002',
            'url' => 'https://archives.bavanco.co.uk/storage/bavanco/version2002/',
            'created_at' => Carbon::createFromDate(2002, 1, 1)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'sites',
            'url' => 'https://sites.adrianbavister.com',
            'created_at' => Carbon::createFromDate(2015, 6, 11)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'world-times',
            'url' => null,
            'created_at' => Carbon::createFromDate(2016, 9, 5)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'about-author',
            'url' => 'https://adrianbavister.com/',
            'created_at' => Carbon::createFromDate(2015, 11, 3)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'bavanco-version-2008',
            'url' => 'https://archives.bavanco.co.uk/storage/bavanco/version2008/',
            'created_at' => Carbon::createFromDate(2008, 1, 1)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'world-temperatures',
            'url' => null,
            'created_at' => Carbon::createFromDate(2016, 9, 5)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'archives',
            'url' => 'https://archives.bavanco.co.uk',
            'created_at' => Carbon::createFromDate(2015, 10, 30)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'bavanco-under-construction',
            'url' => 'https://archives.bavanco.co.uk/storage/bavanco/underconstruction/',
            'created_at' => Carbon::createFromDate(2003, 1, 1)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'bavanco-version-2001',
            'url' => 'https://archives.bavanco.co.uk/storage/bavanco/version2001/',
            'created_at' => Carbon::createFromDate(2001, 1, 1)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'bavanco-version-2003',
            'url' => 'https://archives.bavanco.co.uk/storage/bavanco/version2003/',
            'created_at' => Carbon::createFromDate(2003, 1, 1)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'bavanco-coming-soon',
            'url' => 'https://archives.bavanco.co.uk/storage/bavanco/comingsoon/',
            'created_at' => Carbon::createFromDate(2015, 1, 1)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'screaming-bears-version-1',
            'url' => 'https://archives.bavanco.co.uk/storage/screamingbears/version1/',
            'created_at' => Carbon::createFromDate(1999, 1, 1)->toDateTimeString(),
        ],
        [
            'site_identifier' => 'screaming-bears-version-2',
            'url' => 'https://archives.bavanco.co.uk/storage/screamingbears/version2/',
            'created_at' => Carbon::createFromDate(2001, 1, 1)->toDateTimeString(),
        ],
    ],

];

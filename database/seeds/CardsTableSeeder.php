<?php

use Illuminate\Database\Seeder;

use App\Card;
use Carbon\Carbon;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Card::create([
            'site_identifier' => 'blog',
            'url' 	          => 'https://blog.bavanco.co.uk',
            'created_at'      => Carbon::createFromDate(2019, 05, 02)->toDateTimeString(),
        ]);

		Card::create([
            'site_identifier' => 'gallery',
            'url' 	          => 'https://travel.bavanco.co.uk',
            'created_at'      => Carbon::createFromDate(2017, 11, 30)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'about-website',
            'url'             => '/about',
            'created_at'      => Carbon::createFromDate(2015, 11, 3)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'kittyscampers',
            'url'             => 'https://archives.bavanco.co.uk/kittyscampers/',
        ]);

        Card::create([
            'site_identifier' => 'screaming-bears-under-construction',
            'url'             => 'https://archives.bavanco.co.uk/screamingbears/underconstruction/',
        ]);

        Card::create([
            'site_identifier' => 'bavanco-version-2002',
            'url'             => 'https://archives.bavanco.co.uk/bavanco/version2002/',
        ]);

        Card::create([
            'site_identifier' => 'sites',
            'url'             => 'https://sites.adrianbavister.com',
            'created_at'      => Carbon::createFromDate(2015, 6, 11)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'world-times',
            'created_at'      => Carbon::createFromDate(2016, 9, 5)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'about-author',
            'url'             => 'https://adrianbavister.com/',
            'created_at'      => Carbon::createFromDate(2015, 11, 3)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'bavanco-version-2008',
            'url'             => 'https://archives.bavanco.co.uk/bavanco/version2008/',
        ]);

        Card::create([
            'site_identifier' => 'world-temperatures',
            'created_at'      => Carbon::createFromDate(2016, 9, 5)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'archives',
            'url'             => 'https://archives.bavanco.co.uk',
            'created_at'      => Carbon::createFromDate(2015, 10, 30)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'bavanco-under-construction',
            'url'             => 'https://archives.bavanco.co.uk/bavanco/underconstruction/',
        ]);

        Card::create([
            'site_identifier' => 'bavanco-version-2001',
            'url'             => 'https://archives.bavanco.co.uk/bavanco/version2001/',
        ]);

        Card::create([
            'site_identifier' => 'bavanco-version-2003',
            'url'             => 'https://archives.bavanco.co.uk/bavanco/version2003/',
        ]);

        Card::create([
            'site_identifier' => 'bavanco-coming-soon',
            'url'             => 'https://archives.bavanco.co.uk/bavanco/comingsoon/',
        ]);

        Card::create([
            'site_identifier' => 'screaming-bears-version-1',
            'url'             => 'https://archives.bavanco.co.uk/screamingbears/version1/',
        ]);

        Card::create([
            'site_identifier' => 'screaming-bears-version-2',
            'url'             => 'https://archives.bavanco.co.uk/screamingbears/version2/',
        ]);
    }
}

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
            'url' 	          => (App::environment() == 'local') ? 'http://blog.bavanco.local' : 'http://blog.bavanco.co.uk',
        ]);

		Card::create([
            'site_identifier' => 'gallery',
            'url' 	          => (App::environment() == 'local') ? 'http://gallery.bavanco.local' : 'http://gallery.bavanco.co.uk',
        ]);

        Card::create([
            'site_identifier' => 'about-website',
            'url'             => '/about',
        ]);

        Card::create([
            'site_identifier' => 'monopoly',
            'url'             => '/monopoly',
        ]);

        Card::create([
            'site_identifier' => 'lumi',
        ]);

        Card::create([
            'site_identifier' => 'cat-a-log',
        ]);

        Card::create([
            'site_identifier' => 'sites',
            'url'             => (App::environment() == 'local') ? 'http://sites.adrianbavister.local' : 'http://sites.adrianbavister.com',
            'created_at'      => Carbon::createFromDate(2015, 6, 11)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'about-author',
            'url'             => 'http://adrianbavister.com/',
            'created_at'      => Carbon::createFromDate(2015, 11, 3)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'archives',
            'url'             => (App::environment() == 'local') ? 'http://archives.bavanco.local' : 'http://archives.bavanco.co.uk',
            'created_at'      => Carbon::createFromDate(2015, 10, 30)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'world-temperatures',
            'created_at'      => Carbon::createFromDate(2016, 9, 5)->toDateTimeString(),
        ]);

        Card::create([
            'site_identifier' => 'world-times',
            'created_at'      => Carbon::createFromDate(2016, 9, 5)->toDateTimeString(),
        ]);
    }

}

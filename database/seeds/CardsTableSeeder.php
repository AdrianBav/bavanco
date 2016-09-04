<?php

use Illuminate\Database\Seeder;

use App\Card;

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
            'created_at'      => $this->random_date(),
        ]);

		Card::create([
            'site_identifier' => 'gallery',
            'url' 	          => 'https://html5up.net/uploads/demos/multiverse',
            'created_at'      => $this->random_date(),
        ]);

        Card::create([
            'site_identifier' => 'about-website',
            'url'             => '/about',
            'created_at'      => $this->random_date(),
        ]);

        Card::create([
            'site_identifier' => 'monopoly',
            'url'             => '/monopoly',
            'created_at'      => $this->random_date(),
        ]);

        Card::create([
            'site_identifier' => 'lumi',
            'url'             => '/lumi',
            'created_at'      => $this->random_date(),
        ]);

        Card::create([
            'site_identifier' => 'cat-a-log',
            'url'             => '/cat-a-log',
            'created_at'      => $this->random_date(),
        ]);

        Card::create([
            'site_identifier' => 'sites',
            'url'             => (App::environment() == 'local') ? 'http://sites.adrianbavister.local' : 'http://sites.adrianbavister.com',
            'created_at'      => $this->random_date(),
        ]);

        Card::create([
            'site_identifier' => 'about-author',
            'url'             => '/about',
            'created_at'      => $this->random_date(),
        ]);

        Card::create([
            'site_identifier' => 'archives',
            'url'             => 'http://archives.bavanco.co.uk',
            'created_at'      => $this->random_date(),
        ]);

        Card::create([
            'site_identifier' => 'world-temperatures',
            'created_at'      => $this->random_date(),
        ]);

        Card::create([
            'site_identifier' => 'world-times',
            'created_at'      => $this->random_date(),
        ]);
    }

    private function random_date()
    {
        $timestamp = mt_rand(1392055681, 1452055681);

        return date("Y-m-d H:i:s", $timestamp);
    }
}

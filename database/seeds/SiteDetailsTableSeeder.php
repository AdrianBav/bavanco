<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_details')->insert([
            'slug' => 'blog',
            'item1' => '%d articles',
            'number1' => 5,
            'item2' => '%d photos',
            'number2' => 24,
            'info' => 'NO stock photos',
        ]);

        DB::table('site_details')->insert([
            'slug' => 'travel',
            'item1' => '%d destinations',
            'number1' => 10,
            'item2' => '%d photographs',
            'number2' => 351,
            'info' => 'Various cameras',
        ]);

        DB::table('site_details')->insert([
            'slug' => 'myrhdb',
            'item1' => '%d concerts',
            'number1' => 9,
            'item2' => '%d songs',
            'number2' => 220,
            'info' => 'FULL admin dashboard',
        ]);

        DB::table('site_details')->insert([
            'slug' => 'archives',
            'item1' => 'spans %d years',
            'number1' => 20,
            'item2' => 'has %d domains',
            'number2' => 3,
            'info' => 'FULL history',
        ]);

        DB::table('site_details')->insert([
            'slug' => 'sites',
            'item1' => '%d domains',
            'number1' => 4,
            'item2' => '%d microsites',
            'number2' => 8,
            'info' => 'CUSTOM designs',
        ]);
    }
}

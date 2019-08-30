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
            'url' => 'https://blog.bavanco.co.uk/api/meta',
            'token' => '',
        ]);

        DB::table('site_details')->insert([
            'slug' => 'travelography',
            'url' => 'https://travelography.bavanco.co.uk/api/meta',
            'token' => '',
        ]);

        DB::table('site_details')->insert([
            'slug' => 'myrhdb',
            'url' => 'https://myrhdb.bavanco.co.uk/api/meta',
            'token' => '',
        ]);

        DB::table('site_details')->insert([
            'slug' => 'archives',
            'url' => 'https://archives.bavanco.co.uk/api/meta',
            'token' => '',
        ]);

        DB::table('site_details')->insert([
            'slug' => 'sites',
            'url' => 'https://sites.adrianbavister.com/api/meta',
            'token' => '',
        ]);
    }
}

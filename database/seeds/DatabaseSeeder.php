<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('site_details')->truncate();
        DB::table('cards')->truncate();
        DB::table('decks')->truncate();
        Schema::enableForeignKeyConstraints();

        $this->call(DecksTableSeeder::class);
        $this->call(CardsTableSeeder::class);
        $this->call(SiteDetailsTableSeeder::class);

        Artisan::call('cache:clear');
    }
}

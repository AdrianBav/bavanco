<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(CardsTableSeeder::class);

        // The faker library is only available in development
        // Also, on production we'll generate real visit data
        if (App::environment('local'))
        {
            $this->call(VisitsTableSeeder::class);    
        }
    }
}

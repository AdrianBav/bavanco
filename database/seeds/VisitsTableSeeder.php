<?php

use Illuminate\Database\Seeder;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make a bunch of visits
        factory(App\Visit::class, 50)->create();
    }
}

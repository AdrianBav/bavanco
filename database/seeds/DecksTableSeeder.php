<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DecksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (array_keys(config('decks')) as $deck) {
            DB::table('decks')->insert(
                ['name' => $deck]
            );
        }
    }
}

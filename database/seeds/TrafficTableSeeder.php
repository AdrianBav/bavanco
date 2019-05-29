<?php

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrafficTableSeeder extends Seeder
{
    /*
        mfs
        php artisan traffic:migrate

        php artisan db:seed --class=TrafficTableSeeder

        php artisan traffic:dashboard-refresh --fresh
     */

    /**
     * Run the database seeds.
     * # php artisan db:seed --class=TrafficTableSeeder
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::connection('traffic')->table('sites')->insert([
            ['slug' => Str::slug($faker->word), 'robots' => $faker->randomDigit],
            ['slug' => Str::slug($faker->word), 'robots' => $faker->randomDigit],
            ['slug' => Str::slug($faker->word), 'robots' => $faker->randomDigit],
            ['slug' => Str::slug($faker->word), 'robots' => $faker->randomDigit],
            ['slug' => Str::slug($faker->word), 'robots' => $faker->randomDigit],
        ]);

        foreach (range(1, 200) as $ips) {
            DB::connection('traffic')->table('ips')->insert(['address' => $faker->ipv4]);
        }

        foreach (range(1, 80) as $agents) {
            DB::connection('traffic')->table('agents')->insert(['name' => $faker->userAgent]);
        }

        foreach (range(1, 1500) as $visits) {
            DB::connection('traffic')->table('visits')->insert([
                'site_id' => DB::table('sites')->inRandomOrder()->first()->id,
                'ip_id' => DB::table('ips')->inRandomOrder()->first()->id,
                'agent_id' => DB::table('agents')->inRandomOrder()->first()->id,
            ]);
        }
    }
}

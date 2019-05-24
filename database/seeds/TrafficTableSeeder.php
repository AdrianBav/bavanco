<?php

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrafficTableSeeder extends Seeder
{
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

        DB::connection('traffic')->table('ips')->insert([
            ['address' => $faker->ipv4],
            ['address' => $faker->ipv4],
            ['address' => $faker->ipv4],
            ['address' => $faker->ipv4],
            ['address' => $faker->ipv4],
            ['address' => $faker->ipv4],
            ['address' => $faker->ipv4],
            ['address' => $faker->ipv4],
            ['address' => $faker->ipv4],
        ]);

        DB::connection('traffic')->table('agents')->insert([
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
            ['name' => $faker->userAgent],
        ]);

        DB::connection('traffic')->table('visits')->insert([
            [
                'site_id' => DB::table('sites')->inRandomOrder()->first()->id,
                'ip_id' => DB::table('ips')->inRandomOrder()->first()->id,
                'agent_id' => DB::table('agents')->inRandomOrder()->first()->id,
            ],
            [
                'site_id' => DB::table('sites')->inRandomOrder()->first()->id,
                'ip_id' => DB::table('ips')->inRandomOrder()->first()->id,
                'agent_id' => DB::table('agents')->inRandomOrder()->first()->id,
            ],
            [
                'site_id' => DB::table('sites')->inRandomOrder()->first()->id,
                'ip_id' => DB::table('ips')->inRandomOrder()->first()->id,
                'agent_id' => DB::table('agents')->inRandomOrder()->first()->id,
            ],
            [
                'site_id' => DB::table('sites')->inRandomOrder()->first()->id,
                'ip_id' => DB::table('ips')->inRandomOrder()->first()->id,
                'agent_id' => DB::table('agents')->inRandomOrder()->first()->id,
            ],
            [
                'site_id' => DB::table('sites')->inRandomOrder()->first()->id,
                'ip_id' => DB::table('ips')->inRandomOrder()->first()->id,
                'agent_id' => DB::table('agents')->inRandomOrder()->first()->id,
            ],
            [
                'site_id' => DB::table('sites')->inRandomOrder()->first()->id,
                'ip_id' => DB::table('ips')->inRandomOrder()->first()->id,
                'agent_id' => DB::table('agents')->inRandomOrder()->first()->id,
            ],
            [
                'site_id' => DB::table('sites')->inRandomOrder()->first()->id,
                'ip_id' => DB::table('ips')->inRandomOrder()->first()->id,
                'agent_id' => DB::table('agents')->inRandomOrder()->first()->id,
            ],
            [
                'site_id' => DB::table('sites')->inRandomOrder()->first()->id,
                'ip_id' => DB::table('ips')->inRandomOrder()->first()->id,
                'agent_id' => DB::table('agents')->inRandomOrder()->first()->id,
            ],
        ]);
    }
}

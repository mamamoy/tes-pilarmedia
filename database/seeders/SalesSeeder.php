<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];
        for ($i = 0; $i < 5000; $i++) {
            $data[] =
                [
                    'SalesCode' => 'S-' . $i+1,
                    'SalesAmount' => $faker->numberBetween(1000, 99999),
                    'SalesPersonID' => $faker->numberBetween(1, 50),
                    'created_at' => $faker->dateTimeBetween(),
                ];
        }

        // Insert data for this batch
        DB::table('sales')->insert($data);
    }
}

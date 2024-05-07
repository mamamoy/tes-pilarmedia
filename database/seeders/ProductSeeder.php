<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];
        for ($i = 0; $i < 500; $i++) {
            $data[] = [
                'ProductName' => $faker->word(),
                'ProductPrice' => $faker->numberBetween(1, 99999),
                'ProductCode' => 'PRD-' . $i + 1,
                'Desc' => $faker->text(),
            ];
        }

        DB::table('products')->insert($data);
    }
}

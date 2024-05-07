<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];
        for ($i = 0; $i < 50; $i++){
            $data[] = [
                "SalesPersonName" => $faker->name(),
                "Address" => $faker->address(),
                "Telephone" => $faker->phoneNumber(),
            ];
        }

        DB::table('sales_persons')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $batchSize = 10000; 
        $totalRows = 2000000;
        $totalBatches = ceil($totalRows / $batchSize);
    
        for ($batch = 1; $batch <= $totalBatches; $batch++) {
            $data = [];
    
            for ($i = 1; $i <= $batchSize; $i++) {
                $data[] = [
                    'ProductID' => $faker->numberBetween(1,500),
                    'SalesID' => $faker->numberBetween(1,5000),
                ];
            }
    
            // Insert data for this batch
            DB::table('sales_products')->insert($data);
        }
        
    }
}

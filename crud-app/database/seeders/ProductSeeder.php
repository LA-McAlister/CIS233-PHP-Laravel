<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //delete all products 
            //why? 
            //data has been manipulated so muchthat it jsut makes sense 
            //to use fresh data 
        //iterate N number of times to create that many products 
        //create a product 

        \App\Models\Product::query()->delete();

        foreach(range(1,30) as $product) {
            \App\Models\Product::create([
                'name' => 'computer',
                'price' => '399.99',
                'description' => 'Ryzen 4000 Series',
                'item_number' => '3648'
                
            ]);

        }
    }
}

<?php

namespace Database\Seeders;

use Faker\Provider\en_US\Text;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

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

        Product::query()->delete();

        $faker = \Faker\Factory::create();

        foreach(range(1,30) as $product) {
            Product::create([
                'name' => $faker->company,
                'price' => $faker->randomFloat(2, 0, 1000),
                'description' => $faker->text,
                'item_number' => $faker->numberBetween(1000,10000),
                'image' => $faker->imageUrl(width: 50 , height: 50)
            ]);

        }
    }
}

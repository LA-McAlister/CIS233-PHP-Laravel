<?php

namespace Database\Seeders;

use Faker\Provider\en_US\Text;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()

    \App\Models\Review::query()->delete();

    $faker = \Faker\Factory::create();

    foreach (range(1,30) as $review) {
      \App\Models\Review::create([
        'comment' => $faker->text,
        'rating' => $faker->numberBetween(1, 5),
        'product_id' => \App\Models\Product::all()->pluck('id')->random()
      ]);
    };
  };


<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = \Faker\Factory::create();

        foreach(range(1,10) as $user) {
                User::create([
                'name' => $faker->userName,
                'email' => $faker->email,          
            ]);

        }
    }
}

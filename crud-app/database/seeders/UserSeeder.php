<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = \Faker\Factory::create();

        foreach(range(1,10) as $user) {
            \App\Models\User::create([
                    'name' => $faker->userName,
                    'email' => $faker->email(),
                    'password' => Hash::make('Pookielips93'),
                    'role' => $faker->randomElement(['viewer', 'administrator'])         
            ]);

        }
    }
}

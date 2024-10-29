<?php

namespace Database\Seeders;

use App\Models\Athlete;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AthleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $sportCategories = ['Balap Sepeda', 'Bola Voli', 'Bola Basket', 'Sepak Bola', 'Badminton', 'Atletik', 'Renang', 'Tinju', 'Pencak Silat'];

        for ($i = 0; $i < 75; $i++) {
            Athlete::create([
                'id' => $faker->uuid,
                'name' => $faker->name,
                'sport_category' => $faker->randomElement($sportCategories),
                'birth_date' => $faker->date('Y-m-d', '2005-12-31'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'weight' => $faker->randomFloat(2, 45, 100), // Weight in kg
                'height' => $faker->randomFloat(2, 140, 210), // Height in cm
                'achievements' => $faker->sentence,
                'photo' => null, // Adjust if you want to seed photos
            ]);
        }
    }
}

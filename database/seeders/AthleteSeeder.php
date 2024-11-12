<?php

namespace Database\Seeders;

use App\Models\Athlete;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AthleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 80 athletes with IDs starting from A0005
        $startingIdNumber = 5; // Mulai dari A0005
        $athleteCount = 80;

        // Kategori olahraga yang diambil dari sport-category.js
        $sports = [
            "Badminton", "Sepak Bola", "Bola Basket", "Bola Voli",
            "Balap Sepeda", "Atletik", "Renang", "Tinju", "Pencak Silat"
        ];

        $genders = ['Laki-laki', 'Perempuan'];

        for ($i = 0; $i < $athleteCount; $i++) {
            $newId = 'A' . str_pad($startingIdNumber + $i, 4, '0', STR_PAD_LEFT);

            Athlete::create([
                'id' => $newId,
                'name' => 'Atlet ' . Str::random(5),
                'sport_category' => $sports[array_rand($sports)], // Pilih kategori olahraga secara acak
                'birth_date' => Carbon::today()->subYears(rand(18, 35))->format('Y-m-d'),
                'gender' => $genders[array_rand($genders)],
                'weight' => round(rand(5000, 9000) / 100, 2), // Berat dalam kg (50.00 - 90.00)
                'height' => round(rand(1500, 2000) / 10, 2),  // Tinggi dalam cm (150.0 - 200.0)
                'achievements' => 'Prestasi ' . Str::random(10),
                'photo' => null,
            ]);
        }
    }
}

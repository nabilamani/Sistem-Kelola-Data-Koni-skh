<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            ['level_name' => 'Admin', 'description' => 'Administrator of the system'],
            ['level_name' => 'Pengurus Cabor Sepak Bola', 'description' => 'Football event manager'],
            ['level_name' => 'Pengurus Cabor Badminton', 'description' => 'Badminton event manager'],
            ['level_name' => 'Pengurus Cabor Basket', 'description' => 'Basketball event manager'],
            // Add more levels as needed
        ]);
    }
}

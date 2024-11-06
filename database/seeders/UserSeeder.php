<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Admin = User::create([
            'name' => 'Muhammad Nabil Amani',
            'email' => 'adminkoni@gmail.com',
            'password' => bcrypt('koni321'),
            'level' => 'Admin'
        ]);
        $Admin->assignRole('Admin');

        // $pengurus = User::create([
        //     'name' => 'pengurus',
        //     'email' => 'penguruskoni@gmail.com',
        //     'password' => bcrypt('pengurusi321'),
        //     'level' => 'Pengurus Cabor Sepak Bola'
        // ]);
        // $pengurus->assignRole('pengurus');
    }
}

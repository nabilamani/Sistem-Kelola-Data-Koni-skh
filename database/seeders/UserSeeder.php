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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'adminkoni@gmail.com',
            'password' => bcrypt('koni321')
        ]);
        $admin->assignRole('admin');

        $pengurus = User::create([
            'name' => 'pengurus',
            'email' => 'penguruskoni@gmail.com',
            'password' => bcrypt('pengurusi321')
        ]);
        $pengurus->assignRole('pengurus');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KoniStructures;
use Illuminate\Support\Carbon;

class KoniStructuresSeeder extends Seeder
{
    public function run()
    {
        $structures = [
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Iwan Gunarto, SE',
                'position' => 'Ketua Umum',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Drs. H. Sukono',
                'position' => 'Wakil Ketua Umum I',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Drs. H. Sukirso',
                'position' => 'Wakil Ketua Umum II',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Iwan Setyono, S.STP, M.Hum',
                'position' => 'Sekretaris Umum',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Herdis Kurnia Wijaya, S.Sos',
                'position' => 'Wakil Sekretaris Umum',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Agus Saptono, S.H',
                'position' => 'Bendahara Umum',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Erna Indriastuti, A.Md',
                'position' => 'Wakil Bendahara Umum',
                'birth_date' => '1970-01-01',
                'gender' => 'Perempuan',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Agus Wahyudi, S.Pd',
                'position' => 'Audit Internal',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Suharno, S.H',
                'position' => 'Bidang Organisasi & Kerjasama Antar Lembaga',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Yudianta, SE',
                'position' => 'Bidang Organisasi & Kerjasama Antar Lembaga',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            [
                'id' => (new KoniStructures)->generateId(),
                'name' => 'Sugeng Widodo, S.Sos., M.Si',
                'position' => 'Bidang Hukum Keolahragaan',
                'birth_date' => '1970-01-01',
                'gender' => 'Laki-laki',
                'photo' => 'path/to/photo.jpg'
            ],
            // Add additional entries as needed, following the pattern
        ];

        foreach ($structures as $structure) {
            KoniStructures::create($structure);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'lihat-user']);

        Permission::create(['name'=>'tambah-data']);
        Permission::create(['name'=>'edit-data']);
        Permission::create(['name'=>'hapus-data']);
        Permission::create(['name'=>'lihat-data']);

        Role::create(['name'=>'Admin']);
        Role::create(['name'=>'Pengurus Cabor Sepak Bola']);

        $roleAdmin = Role::findByName('Admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $rolePengurus = Role::findByName('Pengurus Cabor Sepak Bola');
        $rolePengurus ->givePermissionTo(('tambah-data'));
        $rolePengurus ->givePermissionTo(('edit-data'));
        $rolePengurus ->givePermissionTo(('hapus-data'));
        $rolePengurus ->givePermissionTo(('lihat-data'));
    }
}

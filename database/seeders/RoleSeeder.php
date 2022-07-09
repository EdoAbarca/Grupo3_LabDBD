<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->id = 1;
        $role->role_name = "Administrador";
        $role->delete = false;
        $role->save();

        $role = new Role();
        $role->id = 2;
        $role->role_name = "Artista";
        $role->delete = false;
        $role->save();

        $role = new Role();
        $role->id = 3;
        $role->role_name = "Usuario";
        $role->delete = false;
        $role->save();

    }
}

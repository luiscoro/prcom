<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $client = Role::create(['name' => 'Client']);

        $admin_user = User::create([
            'name'=>'Gustavo',
            'apellidos'=>'Morales',
            'telefono'=>'012345678',
            'edad'=>23,
            'email'=>'gamr21@outlook.es',
            'password'=>'$2y$10$UWrWMU9GPWytScvIDu5fMOJTfiCvqA/ZpjxTiu7Js0310ySTjuYPy'
        ]);
        $admin_user->perfil()->create();
        $admin_user->assignRole('Admin');

        $admin_user = User::create([
            'name'=>'Cristian',
            'apellidos'=>'Venua',
            'telefono'=>'012345678',
            'edad'=>23,
            'email'=>'cristianpasionreal@gmail.com',
            'password'=>'$2y$10$FNJddNPlaZKtOO9GL/fFJuQqlHdcKnwNQ1BDYPaaXcjNVO.Ot8cI2'
        ]);
        $admin_user->perfil()->create();
        $admin_user->assignRole('Admin');

        $admin_user = User::create([
            'name'=>'Marco',
            'apellidos'=>'Perez',
            'telefono'=>'012345678',
            'edad'=>23,
            'email'=>'marcopasionreal@gmail.com',
            'password'=>'$2y$10$tDMMTCA7kAxmS8RRHR0QyOXZxsBz7ebUBCfORC9eiX/OCErmqsjWy'
        ]);
        $admin_user->perfil()->create();
        $admin_user->assignRole('Admin');
        
        $client_user = User::create([
            'name'=>'Alex',
            'apellidos'=>'Suarez',
            'telefono'=>'012345678',
            'edad'=>23,
            'email'=>'alexis.suarez@espoch.edu.ec',
            'password'=>'$2y$10$UWrWMU9GPWytScvIDu5fMOJTfiCvqA/ZpjxTiu7Js0310ySTjuYPy'
        ]);
        $client_user->perfil()->create();
        $client_user->assignRole('Client');
    }
}

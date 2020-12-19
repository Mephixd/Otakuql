<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         
        //Creacion de los usuarios admin y moderador
        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@otakuql.cl',
            'password' => bcrypt('123456'),
        ]);

        $mod = \App\Models\User::factory()->create([
            'name' => 'Moderador',
            'email' => 'mod@otakuql.cl',
            'password' => bcrypt('123456'),
        ]);
        //Creacion de usuarios sin roles
        $user = \App\Models\User::factory()->create([
            'name'=> 'User',
            'email'=> 'user@otakuql.cl',
            'password'=> bcrypt('123456')
        ]);

        //Creacion de los permisos 
        Permission::create(['name' => 'Catalogo']);
        Permission::create(['name' => 'Usuarios']);
        Permission::create(['name' => 'Posts']);

       
        //Rol admin tendra permisos para usuarios,Catalogo,Posts
        $roleAdmin = Role::create(['name' => 'Administrativo']);
        $roleAdmin->givePermissionTo('Usuarios');
        $roleAdmin->givePermissionTo('Catalogo');
        $roleAdmin->givePermissionTo('Posts');

        //Asignar Rol admin al usuario Admin
        $admin->assignRole($roleAdmin);

        //Rol mod tendra permisos para Catalogo y Posts
        $roleMod = Role::create(['name'=>'mod']);
        $roleMod->givePermissionTo([
            'Catalogo',
            'Posts'  
         ]);
         //Asignar Rol mod al usuario Moderador
         $mod->assignRole($roleMod);

        
     

    }
}

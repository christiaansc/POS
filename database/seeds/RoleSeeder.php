<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name'=>'Administrador']);
        $roleCajero = Role::create(['name'=>'Cajero']);
        

        Permission::create(['name'=>'admin.home'])->assignRole($roleAdmin,$roleCajero);

        Permission::create(['name'=>'admin.users'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.users.create'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.users.edit'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.users.destroy'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.users.show'])->assignRole($roleAdmin);

        
        Permission::create(['name'=>'admin.roles'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.roles.create'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.roles.edit'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.roles.destroy'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.roles.show'])->assignRole($roleAdmin);

        Permission::create(['name'=>'gastos.index'])->assignRole($roleAdmin);   



       
        
    }
}

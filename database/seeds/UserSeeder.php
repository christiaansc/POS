<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'christian sanchez',
            'email'=>'cristiaan.sc@gmail.com',
            'password'=>bcrypt('asdasdasd')
        ])->assignRole('Administrador');
        User::create([
            'name'=>'TestRole cajero',
            'email'=>'asd@asd.cl',
            'password'=>bcrypt('asdasdasd')
        ])->assignRole('Cajero');
    }
}

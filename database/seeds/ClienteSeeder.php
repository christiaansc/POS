<?php

use Illuminate\Database\Seeder;
use App\Cliente;
class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cliente::create([
            'nombre'=>'Nuevo Cliente',
            'correo'=>'prueba@gmail.com',
            'direccion'=>'asdasdasd',
            'ruc'=>'77331703-8',
            'dni' =>'98883393',
            'telefono' =>'98883393',
            'correo' =>'98883393',
        ]);
    }
}

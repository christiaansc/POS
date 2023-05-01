<?php

use Illuminate\Database\Seeder;

use App\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'nombre'=>'Waffles Bike',
            'correo'=>'cristiaan.sc@gmail.com',
            'direccion'=>'asdasdasd',
            'ruc_number'=>'77331703-8',
            'telefono' =>'98883393'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use App\Models\dato_ubicacion;

class DatoUbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        dato_ubicacion::create([
        'estado'           =>'Aragua',
        'municipio'        =>'Santos Michelena',
        'ciudad'           =>'Tejerias',
        'parroquia'        =>'Arévalo Aponte',
        'direccion'        =>'Calle 5 Avenida 3, Sector la guayaba',
        'telefono'         =>'555-2335-2222',
        'correo'           =>'hola@example.com',

           ]);
        dato_ubicacion::create([
        'estado'           =>'Aragua',
        'municipio'        =>'Jose Felix Ribas',
        'ciudad'           =>'La Victoria',
        'parroquia'        =>'Jose Rafael Revenga',
        'direccion'        =>'El Consejo',
        'telefono'         =>'555-2335-2222',
        'correo'           =>'hola2@example.com',

           ]);
        dato_ubicacion::create([
        'estado'           =>'Aragua',
        'municipio'        =>'Jose Felix Ribas',
        'ciudad'           =>'La Victoria',
        'parroquia'        =>'Castor Nieves Rios',
        'direccion'        =>'Urb Las Mercedes, sector 2',
        'telefono'         =>'222-2456-6566',
        'correo'           =>'hola3@example.com',

           ]);
        dato_ubicacion::create([
        'estado'           =>'Aragua',
        'municipio'        =>'Jose Felix Ribas',
        'ciudad'           =>'La Victoria',
        'parroquia'        =>'Castor Nieves Rios',
        'direccion'        =>'Urb Las Mercedes, sector 1',
        'telefono'         =>'999-5689-2563',
        'correo'           =>'hola4@example.com',

           ]);
        dato_ubicacion::create([
        'estado'           =>'Aragua',
        'municipio'        =>'Jose Felix Ribas',
        'ciudad'           =>'La Victoria',
        'parroquia'        =>'Castor Nieves Rios',
        'direccion'        =>'Urb Las Mercedes, sector 6',
        'telefono'         =>'345-2044-5555',
        'correo'           =>'hola5@example.com',

           ]);
        
        
    }
}

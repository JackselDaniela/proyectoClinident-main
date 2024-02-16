<?php

namespace Database\Seeders;

use App\Models\ciudad;
use Illuminate\Database\Seeder;
use App\Models\dato_ubicacion;
use App\Models\estado;
use App\Models\municipio;
use App\Models\parroquia;

class DatoUbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aragua = estado::firstWhere('estado', 'Aragua');
        $jose = municipio::firstWhere('municipio', 'José Félix Ribas');
        $lavic = ciudad::firstWhere('ciudad', 'La Victoria');
        $castor = parroquia::firstWhere('parroquia', 'Castor Nieves Ríos');

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => municipio::firstWhere('municipio', 'Santos Michelena')->id_municipio,
            'ciudades_id'           => ciudad::firstWhere('ciudad', 'Las Tejerías')->id_ciudad,
            'parroquias_id'        => parroquia::firstWhere('parroquia', 'Santos Michelena')->id_parroquia,
            'direccion'        => 'Calle 5 Avenida 3, Sector la guayaba',
            'telefono'         => '555-2335-2222',
            'correo'           => 'hola@example.com',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => parroquia::firstWhere('parroquia', 'José Rafael Revenga')->id_parroquia,
            'direccion'        => 'El Consejo',
            'telefono'         => '555-2335-2222',
            'correo'           => 'hola2@example.com',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 2',
            'telefono'         => '222-2456-6566',
            'correo'           => 'hola3@example.com',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 1',
            'telefono'         => '999-5689-2563',
            'correo'           => 'hola4@example.com',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 6',
            'telefono'         => '345-2044-5555',
            'correo'           => 'hola5@example.com',
        ]);
    }
}

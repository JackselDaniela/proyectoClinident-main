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
            'telefono'         => '0412356478',
            
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => parroquia::firstWhere('parroquia', 'José Rafael Revenga')->id_parroquia,
            'direccion'        => 'El Consejo',
            'telefono'         => '89499079',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 2',
            'telefono'         => '0412356478',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 1',
            'telefono'         => '953991291',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 6',
            'telefono'         => '0412356478',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => municipio::firstWhere('municipio', 'Santos Michelena')->id_municipio,
            'ciudades_id'           => ciudad::firstWhere('ciudad', 'Las Tejerías')->id_ciudad,
            'parroquias_id'        => parroquia::firstWhere('parroquia', 'Santos Michelena')->id_parroquia,
            'direccion'        => 'Calle 5 Avenida 3, Sector la guayaba',
            'telefono'         => '0412356478',
            
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => parroquia::firstWhere('parroquia', 'José Rafael Revenga')->id_parroquia,
            'direccion'        => 'El Consejo',
            'telefono'         => '0412356478',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 2',
            'telefono'         => '0412356478',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 1',
            'telefono'         => '0412356478',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 6',
            'telefono'         => '04245678900',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => municipio::firstWhere('municipio', 'Santos Michelena')->id_municipio,
            'ciudades_id'           => ciudad::firstWhere('ciudad', 'Las Tejerías')->id_ciudad,
            'parroquias_id'        => parroquia::firstWhere('parroquia', 'Santos Michelena')->id_parroquia,
            'direccion'        => 'Calle 5 Avenida 3, Sector la guayaba',
            'telefono'         => '04123564789',
            
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => parroquia::firstWhere('parroquia', 'José Rafael Revenga')->id_parroquia,
            'direccion'        => 'El Consejo',
            'telefono'         => '0212234567',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 2',
            'telefono'         => '0414789234',
        ]);

        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 1',
            'telefono'         => '0412345678',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 1',
            'telefono'         => '0412345678',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 1',
            'telefono'         => '942023558',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 1',
            'telefono'         => '83913383',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 1',
            'telefono'         => '938781210',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Las Mercedes, sector 1',
            'telefono'         => '99795138',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'San fernando',
            'telefono'         => '958396846',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'San Carlos',
            'telefono'         => '9583345678',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'San Carlos',
            'telefono'         => '9583323458',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'San Joaquin',
            'telefono'         => '9583312348',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'San Juan',
            'telefono'         => '9583312348',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 3',
            'telefono'         => '9583000348',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 4',
            'telefono'         => '9583000348',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 3',
            'telefono'         => '988300012',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Araguaney av 2',
            'telefono'         => '3418300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb La Rosas av 2',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb pelicano, transversal 2 casa 10',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Joaquina Del sur vereda 3 casa 6',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 2',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 2',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);
        dato_ubicacion::create([
            'estados_id'           => $aragua->id_estado,
            'municipios_id'        => $jose->id_municipio,
            'ciudades_id'           => $lavic->id_ciudad,
            'parroquias_id'        => $castor->id_parroquia,
            'direccion'        => 'Urb Casimiro av 1',
            'telefono'         => '958300077',
        ]);

      
    }
}

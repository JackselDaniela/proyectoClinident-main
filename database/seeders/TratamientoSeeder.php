<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\registrar_tratamiento;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        registrar_tratamiento::create([
            'nom_tratamiento' => 'Extracción-Simple',
            'costo_tratamiento' => '100$',
            'codigo_tratamiento' => '0001',
            'fecha_añadido' => '10/10/2013',
            'especialidads_id' => '4',

        ]);
        registrar_tratamiento::create([
            'nom_tratamiento' => 'Extracción-Compleja',
            'costo_tratamiento' => '200$',
            'codigo_tratamiento' => '0002',
            'fecha_añadido' => '11/10/2013',
            'especialidads_id' => '1',

        ]);
        registrar_tratamiento::create([
            'nom_tratamiento' => 'Reconstrucción',
            'costo_tratamiento' => '50$',
            'codigo_tratamiento' => '0003',
            'fecha_añadido' => '11/10/2013',
            'especialidads_id'=> '4',

        ]);
        registrar_tratamiento::create([
            'nom_tratamiento' => 'Extraccion-Simple Incluida',
            'costo_tratamiento' => '250$',
            'codigo_tratamiento' => '0004',
            'fecha_añadido' => '12/10/2013',
            'especialidads_id' => '4',

        ]);
        registrar_tratamiento::create([
            'nom_tratamiento' => 'Extraccion-Simple Semi-Incluida',
            'costo_tratamiento' => '150$',
            'codigo_tratamiento' => '0005',
            'fecha_añadido' => '12/10/2013',
            'especialidads_id'=> '4',

        ]);
        registrar_tratamiento::create([
            'nom_tratamiento' => 'Restauración',
            'costo_tratamiento' => '300$',
            'codigo_tratamiento' => '0006',
            'fecha_añadido' => '12/10/2013',
            'especialidads_id' => '4',

        ]);
        registrar_tratamiento::create([
            'nom_tratamiento' => 'Limpieza',
            'costo_tratamiento' => '50$',
            'codigo_tratamiento' => '0007',
            'fecha_añadido' => '12/10/2013',
            'especialidads_id' => '4',

        ]);
        registrar_tratamiento::create([
            'nom_tratamiento' => 'Blanqueamiento',
            'costo_tratamiento' => '400$',
            'codigo_tratamiento' => '0008',
            'fecha_añadido' => '12/10/2013',
            'especialidads_id'=> '4',

        ]);
    }
}

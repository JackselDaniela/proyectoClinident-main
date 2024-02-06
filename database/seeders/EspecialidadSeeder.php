<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\especialidad;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        especialidad::create([
            'especialidad'       => 'Endodoncia',
            'codigo_especialidad'=> 'OD-End',

        ]);
        especialidad::create([
            'especialidad'       => 'Ortodoncia',
            'codigo_especialidad'=> 'OD-Ort',

        ]);
        especialidad::create([
            'especialidad'       => 'Maxilo facial',
            'codigo_especialidad'=> 'OD-Max',

        ]);
        especialidad::create([
            'especialidad'       => 'Odontologia General',
            'codigo_especialidad'=> 'OD-Gen',

        ]);
        especialidad::create([
            'especialidad'       => 'Odontopediatria',
            'codigo_especialidad'=> 'OD-Pediatra',

        ]);
        especialidad::create([
            'especialidad'       => 'Periodoncia',
            'codigo_especialidad'=> 'OD-Per',

        ]);
        especialidad::create([
            'especialidad'       => 'Prostodoncia',
            'codigo_especialidad'=> 'OD-Pros',

        ]);
    }
}

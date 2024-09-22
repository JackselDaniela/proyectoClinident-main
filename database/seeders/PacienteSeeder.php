<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use App\Models\persona;
use App\Models\dato_ubicacion;
use App\Models\paciente;
use App\Models\tipo_persona;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        paciente::create([
            'ocupacion'      => 'Albañil',
            'personas_id'    => '4',

        ]);
        paciente::create([
            'ocupacion'      => 'Contador',
            'personas_id'    => '5',

        ]);
        paciente::create([
            'ocupacion'      => 'Chef',
            'personas_id'    => '6',

        ]);
        paciente::create([
            'ocupacion'      => 'Ingeniero Informatico',
            'personas_id'    => '7',

        ]);
        paciente::create([
            'ocupacion'      => 'Publicista',
            'personas_id'    => '8',

        ]);
        paciente::create([
            'ocupacion'      => 'Contador',
            'personas_id'    => '9',

        ]);
        paciente::create([
            'ocupacion'      => 'Diseñador Grafico',
            'personas_id'    => '10',

        ]);
       
        paciente::create([
            'ocupacion'      => 'Diseñador Grafico',
            'personas_id'    => '14',

        ]);
       
        paciente::create([
            'ocupacion'      => 'Diseñador Grafico',
            'personas_id'    => '15',

        ]);
       
        paciente::create([
            'ocupacion'      => 'Diseñador Grafico',
            'personas_id'    => '16',

        ]);
       
        paciente::create([
            'ocupacion'      => 'Diseñador Grafico',
            'personas_id'    => '17',

        ]);
        paciente::create([
            'ocupacion'      => 'Diseñador Grafico',
            'personas_id'    => '18',

        ]);
        paciente::create([
            'ocupacion'      => 'Diseñador Grafico',
            'personas_id'    => '19',

        ]);
        paciente::create([
            'ocupacion'      => 'Diseñador Grafico',
            'personas_id'    => '20',

        ]);
       
        
       
    }
}

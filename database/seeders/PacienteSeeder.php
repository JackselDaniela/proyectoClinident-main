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
       
        paciente::create([
            'ocupacion'      => 'Analista',
            'personas_id'    => '21',

        ]);
        paciente::create([
            'ocupacion'      => 'Enfermera',
            'personas_id'    => '22',

        ]);
        paciente::create([
            'ocupacion'      => 'Ingeniero',
            'personas_id'    => '23',

        ]);
        paciente::create([
            'ocupacion'      => 'Ejecutiva de Ventas',
            'personas_id'    => '24',

        ]);
        paciente::create([
            'ocupacion'      => 'Modelo',
            'personas_id'    => '25',

        ]);
        paciente::create([
            'ocupacion'      => 'No',
            'personas_id'    => '26',

        ]);
        paciente::create([
            'ocupacion'      => 'Modelo',
            'personas_id'    => '27',

        ]);
        paciente::create([
            'ocupacion'      => 'Profesor',
            'personas_id'    => '28',

        ]);
        paciente::create([
            'ocupacion'      => 'Estadistica',
            'personas_id'    => '29',

        ]);
        paciente::create([
            'ocupacion'      => 'No',
            'personas_id'    => '30',

        ]);
        paciente::create([
            'ocupacion'      => 'Estadistica',
            'personas_id'    => '31',

        ]);
        paciente::create([
            'ocupacion'      => 'Albañil',
            'personas_id'    => '32',

        ]);
        paciente::create([
            'ocupacion'      => 'Gerente de Almacen',
            'personas_id'    => '33',

        ]);
        paciente::create([
            'ocupacion'      => 'Supervisor de Ventas',
            'personas_id'    => '34',

        ]);
        paciente::create([
            'ocupacion'      => 'Musico',
            'personas_id'    => '35',

        ]);
        paciente::create([
            'ocupacion'      => 'Artista Plastico',
            'personas_id'    => '36',

        ]);
       
        paciente::create([
            'ocupacion'      => 'Arquitecto',
            'personas_id'    => '37',

        ]);
        paciente::create([
            'ocupacion'      => 'Ingeniero',
            'personas_id'    => '38',

        ]);
        paciente::create([
            'ocupacion'      => 'Profesor',
            'personas_id'    => '39',

        ]);
        paciente::create([
            'ocupacion'      => 'Ingeniero',
            'personas_id'    => '40',

        ]);
        paciente::create([
            'ocupacion'      => 'Ingeniero',
            'personas_id'    => '41',

        ]);
        paciente::create([
            'ocupacion'      => 'Ingeniero',
            'personas_id'    => '42',

        ]);
        paciente::create([
            'ocupacion'      => 'Ingeniero',
            'personas_id'    => '43',

        ]);
        paciente::create([
            'ocupacion'      => 'Ingeniero',
            'personas_id'    => '44',

        ]);
        
        paciente::create([
            'ocupacion'      => 'Ingeniero',
            'personas_id'    => '45',

        ]);
        // paciente::create([
        //     'ocupacion'      => 'Ingeniero',
        //     'personas_id'    => '46',

        // ]);
        
        
       
        
       
    }
}

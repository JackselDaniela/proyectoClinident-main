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
            'personas_id'    => '1',

        ]);
        paciente::create([
            'ocupacion'      => 'Contador',
            'personas_id'    => '2',

        ]);
        paciente::create([
            'ocupacion'      => 'Ingeniero',
            'personas_id'    => '3',

        ]);
       
    }
}

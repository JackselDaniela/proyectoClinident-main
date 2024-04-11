<?php

namespace Database\Seeders;

use App\Models\diagnostico;
use App\Models\doctor;
use App\Models\estatus_tratamiento;
use App\Models\paciente;
use App\Models\paciente_diagnostico;
use App\Models\pieza;
use App\Models\registrar_tratamiento;
use Illuminate\Database\Seeder;

class PacienteDiagnosticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        paciente_diagnostico::create([
            'pacientes_id' => 1,
            'diagnosticos_id' => 6,
            'doctor_id' => 1,
            'piezas_id' => 25,
            'registrar_tratamientos_id' =>5,
            'estatus_tratamientos_id' => 1,
        ]);
        paciente_diagnostico::create([
            'pacientes_id' =>2,
            'diagnosticos_id' => 2,
            'doctor_id' => 3,
            'piezas_id' => 30,
            'registrar_tratamientos_id' => 2,
            'estatus_tratamientos_id' => estatus_tratamiento::first()->id,
        ]);
        paciente_diagnostico::create([
            'pacientes_id' =>3,
            'diagnosticos_id' => 2,
            'doctor_id' => 3,
            'piezas_id' => 30,
            'registrar_tratamientos_id' => 2,
            'estatus_tratamientos_id' => estatus_tratamiento::first()->id,
        ]);
        paciente_diagnostico::create([
            'pacientes_id' =>4,
            'diagnosticos_id' => 2,
            'doctor_id' => 3,
            'piezas_id' => 30,
            'registrar_tratamientos_id' => 2,
            'estatus_tratamientos_id' => estatus_tratamiento::first()->id,
        ]);
        paciente_diagnostico::create([
            'pacientes_id' =>5,
            'diagnosticos_id' => 2,
            'doctor_id' => 3,
            'piezas_id' => 30,
            'registrar_tratamientos_id' => 2,
            'estatus_tratamientos_id' => estatus_tratamiento::first()->id,
        ]);
        paciente_diagnostico::create([
            'pacientes_id' =>6,
            'diagnosticos_id' => 2,
            'doctor_id' => 3,
            'piezas_id' => 30,
            'registrar_tratamientos_id' => 2,
            'estatus_tratamientos_id' => estatus_tratamiento::first()->id,
        ]);
        paciente_diagnostico::create([
            'pacientes_id' =>7,
            'diagnosticos_id' => 2,
            'doctor_id' => 3,
            'piezas_id' => 30,
            'registrar_tratamientos_id' => 2,
            'estatus_tratamientos_id' => estatus_tratamiento::first()->id,
        ]);
    }
}

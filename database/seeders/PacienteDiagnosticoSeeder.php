<?php

namespace Database\Seeders;

use App\Models\diagnostico;
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
            'pacientes_id' => paciente::first()->id,
            'diagnosticos_id' => diagnostico::find(2)->id,
            'piezas_id' => pieza::find(2)->id,
            'registrar_tratamientos_id' => registrar_tratamiento::find(2)->id,
            'estatus_tratamientos_id' => estatus_tratamiento::first()->id,
        ]);
    }
}

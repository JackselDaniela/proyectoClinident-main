<?php

namespace Database\Seeders;

use App\Models\estatus_tratamiento;
use App\Models\paciente;
use App\Models\paciente_diagnostico;
use App\Models\Reserva;
use App\Services\Codigo;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diagnosticos = paciente_diagnostico::where(
            'estatus_tratamientos_id',
            estatus_tratamiento::firstWhere('estatus', 'En Proceso')->id
        )->get();

        Reserva::create([
            'codigo' => Codigo::generar('reserva'),
            'descripcion' => 'Equipos médicos reservados para un tratamiento de conducto.',
            'restitucion' => null,
            'paciente_diagnostico_id' => $diagnosticos[0]->id,
        ]);

        Reserva::create([
            'codigo' => Codigo::generar('reserva'),
            'descripcion' => 'Reservado para cirugía odontológica.',
            'restitucion' => now(),
            'paciente_diagnostico_id' => $diagnosticos[1]->id,
        ]);
    }
}

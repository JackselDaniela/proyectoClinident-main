<?php

namespace Database\Seeders;

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
        Reserva::create([
            'codigo' => Codigo::generar('reserva'),
            'descripcion' => 'Equipos médicos reservados para un tratamiento de conducto.',
            'restitucion' => null,
        ]);

        Reserva::create([
            'codigo' => Codigo::generar('reserva'),
            'descripcion' => 'Reservado para cirugía odontológica.',
            'restitucion' => now(),
        ]);
    }
}

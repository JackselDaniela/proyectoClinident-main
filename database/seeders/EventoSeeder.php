<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\cita;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        cita::create([
            'pacientes_id' => '1',
            'doctors_id' => '1',
            'tipo_consultas_id' => '2' ,
            'inicio' => '10:00',
            'fin' => '11:00',
            'fecha' => today()->addDay(),
            'descripcion' => 'holiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiis',

        ]);
    }
}

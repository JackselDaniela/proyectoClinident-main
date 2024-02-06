<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tipo_persona;

class TipoPersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       tipo_persona::create([
        'tipo_persona'=>'Doctor',
       ]);
       tipo_persona::create([
        'tipo_persona'=>'Paciente',
       ]) ;
       
       tipo_persona::create([
        'tipo_persona'=>'Asistente',
       ]);
    }
}

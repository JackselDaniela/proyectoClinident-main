<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        doctor::create([
            
            'universidad'          => 'Universidad del Zulia',
            'experiencia'          => '5 Años',
            'bachillerato'         => 'Secundaria 1',
            'destacado'            => 'Certificacion en Endodoncia Pleural',
            'especialidads_id'     => '1',
            'personas_id'          => '3',
        ]);
       
    }
}

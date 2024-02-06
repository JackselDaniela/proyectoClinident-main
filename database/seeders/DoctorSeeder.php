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
            'personas_id'          => '1',
        ]);
        doctor::create([
            
            'universidad'          => 'Universidad de los Andes',
            'experiencia'          => '10 Años',
            'bachillerato'         => 'Secundaria 2',
            'destacado'            => 'Certificacion en Ortodoncia',
            'especialidads_id'     => '2',
            'personas_id'          => '5',
        ]);
    }
}

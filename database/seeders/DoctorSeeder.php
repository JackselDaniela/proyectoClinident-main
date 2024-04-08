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
            'experiencia'          => '10 Años',
            'bachillerato'         => 'High School Musical',
            'destacado'            => 'No Aplica',
            'especialidads_id'     => '1',
            'personas_id'          => '3',
        ]);
        doctor::create([
            
            'universidad'          => 'UCV',
            'experiencia'          => '5 Años',
            'bachillerato'         => 'Jose Felix Ribas',
            'destacado'            => 'No Aplica',
            'especialidads_id'     => '2',
            'personas_id'          => '11',
        ]);
        doctor::create([
            
            'universidad'          => 'UNERG',
            'experiencia'          => '3 Años',
            'bachillerato'         => 'Secundaria 1',
            'destacado'            => 'Certificacion en Endodoncia Pleural',
            'especialidads_id'     => '3',
            'personas_id'          => '12',
        ]);doctor::create([
            
            'universidad'          => 'UNERG',
            'experiencia'          => '10 Años',
            'bachillerato'         => 'Secundaria 1',
            'destacado'            => 'Diplomado Ortodoncia ',
            'especialidads_id'     => '4',
            'personas_id'          => '13',
        ]);doctor::create([
            
            'universidad'          => 'UNERG',
            'experiencia'          => '5 Años',
            'bachillerato'         => 'Secundaria 1',
            'destacado'            => 'No Aplica',
            'especialidads_id'     => '5',
            'personas_id'          => '14',
        ]);
    }
}

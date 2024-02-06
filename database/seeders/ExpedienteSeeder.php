<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\persona;
use App\Models\expediente;

class ExpedienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        expediente::create([
            'alergia_penicilina'       => 'no',
            'desc_alergia_p'           => 'no',
            'alergia_medicamento'      => 'no',
            'desc_alergia_m'           => 'no',
            'trat_actual'              => 'no',
            'desc_trat_actual'         => 'no',
            'gravidez'                 => 'no',
            'desc_gravidez'            => 'no',
            'hemorragia'               => 'no',
            'desc_hemorragia'          => 'no',
            'desmayos'                 => 'no',
            'desc_desmayos'            => 'no',
            'asma'                     => 'no',
            'desc_asma'                => 'no',
            'diabetes'                 => 'no',
            'desc_diabetes'            => 'no',
            'hipertension'             => 'no',
            'desc_hipertension'        => 'no',
            'epilepsia'                => 'no',
            'desc_epilepsia'           => 'no',
            'cancer_actual'            => 'no',
            'desc_cancer_actual'       => 'no',
            'cancer_pasado'            => 'no',
            'desc_cancer_pasado'       => 'no',
            'vih'                      => 'no',
            'desc_vih'                 => 'no',
            'inmunodeficiente'         => 'no',
            'desc_inmunodeficiente'    => 'no',
            'fumador'                  => 'no',
            'desc_fumador'             => 'no',
            'pacientes_id'             => '1',
            
            ]);
        expediente::create([
            'alergia_penicilina'       => 'no',
            'desc_alergia_p'           => 'no',
            'alergia_medicamento'      => 'no',
            'desc_alergia_m'           => 'no',
            'trat_actual'              => 'no',
            'desc_trat_actual'         => 'no',
            'gravidez'                 => 'si',
            'desc_gravidez'            => '5 meses',
            'hemorragia'               => 'SI',
            'desc_hemorragia'          => 'espontanea',
            'desmayos'                 => 'no',
            'desc_desmayos'            => 'no',
            'asma'                     => 'no',
            'desc_asma'                => 'no',
            'diabetes'                 => 'no',
            'desc_diabetes'            => 'no',
            'hipertension'             => 'no',
            'desc_hipertension'        => 'no',
            'epilepsia'                => 'no',
            'desc_epilepsia'           => 'no',
            'cancer_actual'            => 'no',
            'desc_cancer_actual'       => 'no',
            'cancer_pasado'            => 'no',
            'desc_cancer_pasado'       => 'no',
            'vih'                      => 'no',
            'desc_vih'                 => 'no',
            'inmunodeficiente'         => 'no',
            'desc_inmunodeficiente'    => 'no',
            'fumador'                  => 'no',
            'desc_fumador'             => 'no',
            'pacientes_id'             => '2',
            ]);
        expediente::create([
            'alergia_penicilina'       => 'no',
            'desc_alergia_p'           => 'no',
            'alergia_medicamento'      => 'si',
            'desc_alergia_m'           => 'loratadina',
            'trat_actual'              => 'no',
            'desc_trat_actual'         => 'no',
            'gravidez'                 => 'no',
            'desc_gravidez'            => 'no',
            'hemorragia'               => 'no',
            'desc_hemorragia'          => 'no',
            'desmayos'                 => 'no',
            'desc_desmayos'            => 'no',
            'asma'                     => 'si',
            'desc_asma'                => 'severa',
            'diabetes'                 => 'no',
            'desc_diabetes'            => 'no',
            'hipertension'             => 'no',
            'desc_hipertension'        => 'no',
            'epilepsia'                => 'no',
            'desc_epilepsia'           => 'no',
            'cancer_actual'            => 'no',
            'desc_cancer_actual'       => 'no',
            'cancer_pasado'            => 'no',
            'desc_cancer_pasado'       => 'no',
            'vih'                      => 'no',
            'desc_vih'                 => 'no',
            'inmunodeficiente'         => 'no',
            'desc_inmunodeficiente'    => 'no',
            'fumador'                  => 'no',
            'desc_fumador'             => 'no',
            'pacientes_id'             => '3',
            ]);
    
    }
}

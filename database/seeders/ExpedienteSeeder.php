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
            'alergia_penicilina'       => 0,
            'desc_alergia_p'           => 'no',
            'alergia_medicamento'      => 0,
            'desc_alergia_m'           => 'no',
            'trat_actual'              => 0,
            'desc_trat_actual'         => 'no',
            'gravidez'                 => 0,
            'desc_gravidez'            => 'no',
            'hemorragia'               => 0,
            'desc_hemorragia'          => 'no',
            'desmayos'                 => 0,
            'desc_desmayos'            => 'no',
            'asma'                     => 0,
            'desc_asma'                => 'no',
            'diabetes'                 => 0,
            'desc_diabetes'            => 'no',
            'hipertension'             => 0,
            'desc_hipertension'        => 'no',
            'epilepsia'                => 0,
            'desc_epilepsia'           => 'no',
            'cancer_actual'            => 0,
            'desc_cancer_actual'       => 'no',
            'cancer_pasado'            => 0,
            'desc_cancer_pasado'       => 'no',
            'vih'                      => 0,
            'desc_vih'                 => 'no',
            'inmunodeficiente'         => 0,
            'desc_inmunodeficiente'    => 'no',
            'fumador'                  => 0,
            'desc_fumador'             => 'no',
            'pacientes_id'             => '1',

        ]);
        expediente::create([
            'alergia_penicilina'       => 0,
            'desc_alergia_p'           => 'no',
            'alergia_medicamento'      => 0,
            'desc_alergia_m'           => 'no',
            'trat_actual'              => 0,
            'desc_trat_actual'         => 'no',
            'gravidez'                 => 1,
            'desc_gravidez'            => '5 meses',
            'hemorragia'               => 1,
            'desc_hemorragia'          => 'espontanea',
            'desmayos'                 => 0,
            'desc_desmayos'            => 'no',
            'asma'                     => 0,
            'desc_asma'                => 'no',
            'diabetes'                 => 0,
            'desc_diabetes'            => 'no',
            'hipertension'             => 0,
            'desc_hipertension'        => 'no',
            'epilepsia'                => 0,
            'desc_epilepsia'           => 'no',
            'cancer_actual'            => 0,
            'desc_cancer_actual'       => 'no',
            'cancer_pasado'            => 0,
            'desc_cancer_pasado'       => 'no',
            'vih'                      => 0,
            'desc_vih'                 => 'no',
            'inmunodeficiente'         => 0,
            'desc_inmunodeficiente'    => 'no',
            'fumador'                  => 0,
            'desc_fumador'             => 'no',
            'pacientes_id'             => '2',
        ]);
    }
}

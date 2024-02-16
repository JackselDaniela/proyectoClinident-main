<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tipo_consulta;
class TipoConsultaSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipo_consulta::create([
            'tipo_consulta'       => 'Primera Vez',
            

        ]);
        tipo_consulta::create([
          
            'tipo_consulta'       => 'Paciente Regular',
           

        ]);
        tipo_consulta::create([
           
            'tipo_consulta'       => 'Control',
            

        ]);
        tipo_consulta::create([
            
            'tipo_consulta'       => 'Emergencia',

        ]);
    }
}

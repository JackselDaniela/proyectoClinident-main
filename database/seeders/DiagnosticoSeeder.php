<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\diagnostico;

class DiagnosticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        diagnostico::create([
            'diagnostico' => 'Gingivitis',
        ]);
        diagnostico::create([
            'diagnostico' => 'Periodontitis',
        ]);
        diagnostico::create([
            'diagnostico' => 'Caries',
        ]);
        diagnostico::create([
            'diagnostico' => 'Abfración',
        ]);
        diagnostico::create([
            'diagnostico' => 'Abrasión',
        ]);
        diagnostico::create([
            'diagnostico' => 'Erosión',
        ]);
        diagnostico::create([
            'diagnostico' => 'Atrición',
        ]);
        diagnostico::create([
            'diagnostico' => 'Tercer Molar Erupcionado',
        ]);
        diagnostico::create([
            'diagnostico' => 'Tercer Molar Incluido',
        ]);
        diagnostico::create([
            'diagnostico' => 'Tercer Molar Semi-incluido',
        ]);
        diagnostico::create([
            'diagnostico' => 'Fractura Incompleta',
        ]);
        diagnostico::create([
            'diagnostico' => 'Fractura No-Complicada de la Corona',
        ]);
        diagnostico::create([
            'diagnostico' => 'Fractura Complicada de la Corona',
        ]);
        diagnostico::create([
            'diagnostico' => 'Pieza Faltante',
        ]);
    }
}

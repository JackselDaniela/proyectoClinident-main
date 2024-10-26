<?php

namespace Database\Seeders;

use App\Models\Insumo;
use App\Services\Codigo;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class InsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Insumo::create([
            'nombre' => 'Kit de cirugía',
            'descripcion' => 'Kit de 13 piezas para cirugía odontológica de acero inoxidable.',
            'codigo' => Codigo::generar('insumo'),
            'tipo' => 'Equipo Médico',
            'minimo' => 3,
        ]);

        Insumo::create([
            'nombre' => 'Guantes médicos',
            'descripcion' => 'Guantes médicos esterilizados usados en cirugías y procedimientos.',
            'codigo' => Codigo::generar('insumo'),
            'tipo' => 'Consumible',
            'minimo' => 3,
        ]);

        Insumo::create([
            'nombre' => 'Espejo dental',
            'descripcion' => 'Espejo dental de acero inoxidable con mango de 6 pulgadas.',
            'codigo' => Codigo::generar('insumo'),
            'tipo' => 'Equipo Médico',
            'minimo' => 3,
        ]);

        Insumo::create([
            'nombre' => 'Jeringa de muela del juicio',
            'descripcion' => 'Paquete de 5 jeringas dentales de riego con punta curvada para cuidado dental.',
            'codigo' => Codigo::generar('insumo'),
            'tipo' => 'Consumible',
            'minimo' => 3,
        ]);
    }
}

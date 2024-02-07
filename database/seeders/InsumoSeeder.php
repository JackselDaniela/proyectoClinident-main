<?php

namespace Database\Seeders;

use App\Models\Insumo;
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
            'codigo' => "INS-{$faker->randomNumber(5)}",
            'elaboracion' => '2023-07-07',
            'vencimiento' => null,
            'serial' => "{$faker->randomNumber(4)}-{$faker->randomNumber(4)}-{$faker->randomNumber(4)}",
            'tipo' => 'Reutilizable',
        ]);

        Insumo::create([
            'nombre' => 'Guantes médicos',
            'descripcion' => 'Guantes médicos esterilizados usados en cirugías y procedimientos.',
            'codigo' => "INS-{$faker->randomNumber(5)}",
            'elaboracion' => '2023-12-12',
            'vencimiento' => '2024-06-12',
            'serial' => "{$faker->randomNumber(4)}-{$faker->randomNumber(4)}-{$faker->randomNumber(4)}",
            'tipo' => 'Consumible',
        ]);

        Insumo::create([
            'nombre' => 'Espejo dental',
            'descripcion' => 'Espejo dental de acero inoxidable con mango de 6 pulgadas.',
            'codigo' => "INS-{$faker->randomNumber(5)}",
            'elaboracion' => '2023-11-07',
            'vencimiento' => null,
            'serial' => "{$faker->randomNumber(4)}-{$faker->randomNumber(4)}-{$faker->randomNumber(4)}",
            'tipo' => 'Reutilizable',
        ]);

        Insumo::create([
            'nombre' => 'Jeringa de muela del juicio',
            'descripcion' => 'Paquete de 5 jeringas dentales de riego con punta curvada para cuidado dental.',
            'codigo' => "INS-{$faker->randomNumber(5)}",
            'elaboracion' => '2024-01-07',
            'vencimiento' => '2024-03-07',
            'serial' => "{$faker->randomNumber(4)}-{$faker->randomNumber(4)}-{$faker->randomNumber(4)}",
            'tipo' => 'Consumible',
        ]);
    }
}

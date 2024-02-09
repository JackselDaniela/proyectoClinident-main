<?php

namespace Database\Seeders;

use App\Models\Suministro;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SuministroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Suministro::create([
            'nombre' => 'Kit de cirugía',
            'descripcion' => 'Kit de 13 piezas para cirugía odontológica de acero inoxidable.',
            'codigo' => "INS-{$faker->randomNumber(5, true)}",
            'tipo' => 'Equipo',
        ]);

        Suministro::create([
            'nombre' => 'Guantes médicos',
            'descripcion' => 'Guantes médicos esterilizados usados en cirugías y procedimientos.',
            'codigo' => "INS-{$faker->randomNumber(5, true)}",
            'tipo' => 'Insumo',
        ]);

        Suministro::create([
            'nombre' => 'Espejo dental',
            'descripcion' => 'Espejo dental de acero inoxidable con mango de 6 pulgadas.',
            'codigo' => "INS-{$faker->randomNumber(5, true)}",
            'tipo' => 'Equipo',
        ]);

        Suministro::create([
            'nombre' => 'Jeringa de muela del juicio',
            'descripcion' => 'Paquete de 5 jeringas dentales de riego con punta curvada para cuidado dental.',
            'codigo' => "INS-{$faker->randomNumber(5, true)}",
            'tipo' => 'Insumo',
        ]);
    }
}

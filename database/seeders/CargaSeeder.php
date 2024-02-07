<?php

namespace Database\Seeders;

use App\Models\Carga;
use App\Models\Insumo;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::factory(1)->create();

        $user = User::first();

        $insumos = Insumo::all();

        Carga::create([
            'codigo' => "CRG-{$faker->randomNumber(5)}",
            'cantidad' => 10,
            'elaboracion' => '2023-12-01',
            'vencimiento' => null,
            'insumo_id' => $insumos[0]->id,
            'user_id' => $user->id,
        ]);

        Carga::create([
            'codigo' => "CRG-{$faker->randomNumber(5)}",
            'cantidad' => 20,
            'elaboracion' => '2024-01-04',
            'vencimiento' => '2024-05-04',
            'insumo_id' => $insumos[1]->id,
            'user_id' => $user->id,
        ]);

        Carga::create([
            'codigo' => "CRG-{$faker->randomNumber(5)}",
            'cantidad' => 15,
            'elaboracion' => '2023-06-02',
            'vencimiento' => null,
            'insumo_id' => $insumos[2]->id,
            'user_id' => $user->id,
        ]);

        Carga::create([
            'codigo' => "CRG-{$faker->randomNumber(5)}",
            'cantidad' => 30,
            'elaboracion' => '2024-02-04',
            'vencimiento' => '2024-03-04',
            'insumo_id' => $insumos[3]->id,
            'user_id' => $user->id,
        ]);
    }
}

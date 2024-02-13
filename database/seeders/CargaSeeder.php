<?php

namespace Database\Seeders;

use App\Models\Carga;
use App\Models\Insumo;
use App\Models\Operacion;
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

        $cantidades = [10, 20, 15, 30];

        $operaciones = Insumo::all()->map(
            function (Insumo $insumo, int $i) use($cantidades) {
                return Operacion::create([
                    'cantidad' => $cantidades[$i],
                    'insumo_id' => $insumo->id,
                    'created_at' => now()->subDays(2),
                    'updated_at' => now()->subDays(2),
                ]);
            }
        );

        Carga::create([
            'codigo' => "CRG-{$faker->randomNumber(5, true)}",
            'elaboracion' => '2023-12-01',
            'vencimiento' => null,
            'operacion_id' => $operaciones[0]->id,
            'user_id' => $user->id,
        ]);

        Carga::create([
            'codigo' => "CRG-{$faker->randomNumber(5, true)}",
            'elaboracion' => '2024-01-04',
            'vencimiento' => '2024-05-04',
            'operacion_id' => $operaciones[1]->id,
            'user_id' => $user->id,
        ]);

        Carga::create([
            'codigo' => "CRG-{$faker->randomNumber(5, true)}",
            'elaboracion' => '2023-06-02',
            'vencimiento' => null,
            'operacion_id' => $operaciones[2]->id,
            'user_id' => $user->id,
        ]);

        Carga::create([
            'codigo' => "CRG-{$faker->randomNumber(5, true)}",
            'elaboracion' => '2024-02-04',
            'vencimiento' => '2024-03-04',
            'operacion_id' => $operaciones[3]->id,
            'user_id' => $user->id,
        ]);
    }
}

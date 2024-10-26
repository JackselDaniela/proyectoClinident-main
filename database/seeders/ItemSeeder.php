<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Operacion;
use App\Models\Reserva;
use App\Models\Insumo;
use App\Services\Codigo;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public $insumos;
    public $reservas;

    public function __construct()
    {
        $this->insumos = Insumo::where('tipo', 'Equipo Médico')->get();
        $this->reservas = Reserva::all();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->reservas->each(function (Reserva $reserva) {
            $this->insumos->each(function (Insumo $insumo) use ($reserva) {
                $operacion = Operacion::create([
                    'cantidad' => -3,
                    'insumo_id' => $insumo->id,
                    'codigo' => Codigo::generar('operacion'),
                    'codigo_rest' => Codigo::generar('operacion'),
                    'created_at' => now()->subDay(),
                    'updated_at' => now()->subDay(),
                ]);

                Item::create([
                    'reserva_id' => $reserva->id,
                    'operacion_id' => $operacion->id,
                ]);
            });
        });
    }
}

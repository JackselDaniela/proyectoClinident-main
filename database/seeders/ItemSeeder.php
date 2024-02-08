<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Operacion;
use App\Models\Reserva;
use App\Models\Suministro;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public $suministros;
    public $reservas;

    public function __construct()
    {
        $this->suministros = Suministro::where('tipo', 'Instrumento')->get();
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
            $this->suministros->each(function (Suministro $suministro) use ($reserva) {
                $operacion = Operacion::create([
                    'cantidad' => -3,
                    'suministro_id' => $suministro->id,
                ]);

                Item::create([
                    'reserva_id' => $reserva->id,
                    'operacion_id' => $operacion->id,
                ]);
    
                if ($reserva->restitucion !== null) {
                    $restitucion = Operacion::create([
                        'cantidad' => 3,
                        'suministro_id' => $suministro->id,
                    ]);

                    Item::create([
                        'reserva_id' => $reserva->id,
                        'operacion_id' => $restitucion->id,
                    ]);
                }
            });
        });
    }
}

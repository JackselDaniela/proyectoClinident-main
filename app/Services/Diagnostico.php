<?php

namespace App\Services;

use App\Models\Consumo;
use App\Models\Insumo;
use App\Models\Operacion;
use App\Models\paciente_diagnostico;
use Illuminate\Support\Facades\Validator;

class Diagnostico
{
    public function __construct(protected paciente_diagnostico $diagnostico) {}

    public function registrarConsumos()
    {
        $request = request();
        
        $request->validate([
            'insumos' => ['required', 'array', 'min:1'],
            'insumos.*' => ['array:id,cantidad'],
            'insumos.*.id' => ['numeric', 'integer'],
        ]);

        $insumos = collect($request->input('insumos'));

        $insumos->each(function ($data) {
            $insumo = Insumo::find($data['id']);

            Validator::make($data, [
                'cantidad' => ['numeric', 'integer', 'min:1', 'max:'.$insumo->existencia],
            ], ["La cantidad del insumo \"{$insumo->nombre}\" no debe ser mayor a {$insumo->existencia}"])->validate();
        });

        $insumos->each(function ($insumo) {
            $operacion = Operacion::create([
                'insumo_id' => $insumo['id'],
                'cantidad' => -$insumo['cantidad'],
            ]);

            Consumo::create([
                'paciente_diagnostico_id' => $this->diagnostico->id,
                'operacion_id' => $operacion->id,
            ]);
        });
    }

    public function restituirReservas()
    {
        
    }
}

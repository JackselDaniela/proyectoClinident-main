<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Operacion;
use App\Models\paciente_diagnostico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiagnosticoController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  paciente_diagnostico $paciente_diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show(paciente_diagnostico $paciente_diagnostico)
    {
        $paciente_diagnostico->load([
            'pieza', 'diagnostico', 'paciente.persona', 'registrar_tratamiento',
            'estatus_tratamiento', 'consumos', 'reservas',
        ]);

        return view('diagnosticos.show', [
            'paciente_diagnostico' => $paciente_diagnostico,
            'insumos' => Insumo::options('Consumible'),
        ]);
    }

    public function edit(paciente_diagnostico $paciente_diagnostico)
    {
        return view('diagnosticos.edit', [
            'paciente_diagnostico' => $paciente_diagnostico->load([
                'paciente', 'consumos.operacion.insumo'
            ]),
        ]);
    }

    public function update(Request $request, paciente_diagnostico $paciente_diagnostico)
    {
        $size = $paciente_diagnostico->consumos()->count();

        $request->validate([
            'operaciones' => ['required', 'array', 'size:'.$size],
            'operaciones.*' => ['array:id,cantidad'],
            'operaciones.*.id' => ['numeric', 'integer'],
        ]);
        
        $operaciones = collect($request->input('operaciones'));

        $operaciones->each(function ($data) {
            $operacion = Operacion::find($data['id']);
            $insumo = $operacion->insumo;
            $cantidad = abs($operacion->cantidad);
            $max = $insumo->existencia + $cantidad;

            Validator::make($data, [
                'cantidad' => ['numeric', 'integer', 'min:'.$cantidad, 'max:'.$max],
            ], [
                'cantidad.max' => "La cantidad del insumo \"{$insumo->nombre}\" no debe ser mayor a {$max}",
                'cantidad.min' => "La cantidad del insumo \"{$insumo->nombre}\" no debe ser menor a {$cantidad}",
                ])->validate();

            $operacion->update([
                'cantidad' => -$data['cantidad'],
            ]);
        });

        return redirect()->route('diagnosticos.show', $paciente_diagnostico);
    }
}

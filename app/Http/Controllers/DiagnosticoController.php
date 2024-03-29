<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\doctor;
use App\Models\Insumo;
use App\Models\Operacion;
use App\Models\paciente_diagnostico;
use App\Models\persona;
use App\Services\Codigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DiagnosticoController extends Controller
{
    public function create(paciente_diagnostico $paciente_diagnostico)
    {
        $paciente_diagnostico->load([
            'consumos.operacion.insumo',
        ]);

        if (!$paciente_diagnostico->añadible) {
            abort(404);
        }

        $insumos = $paciente_diagnostico->insumos_añadibles;

        return view('consumos.create', [
            'paciente_diagnostico' => $paciente_diagnostico,
            'insumos' => Insumo::mapToSelect($insumos),
        ]);
    }

    public function store(Request $request, paciente_diagnostico $paciente_diagnostico)
    {
        $ids = $paciente_diagnostico->insumos_añadibles->map(fn($ins) => $ins->id);

        $data = $request->validate([
            'insumo_id' => ['required', 'numeric', 'integer', Rule::in($ids)],
            'cantidad' => ['required', 'numeric', 'integer', 'min:1'],
        ]);

        $max = Insumo::find($data['insumo_id'])->existencia;

        $request->validate([
            'cantidad' => 'max:'.$max,
        ]);

        $operacion = Operacion::create([
            'insumo_id' => $data['insumo_id'],
            'cantidad' => -$data['cantidad'],
            'codigo' => Codigo::generar('operacion'),
            'codigo_rest' => Codigo::generar('operacion'),
        ]);

        Consumo::create([
            'operacion_id' => $operacion->id,
            'paciente_diagnostico_id' => $paciente_diagnostico->id,
        ]);

        return redirect()->route('diagnosticos.show', $paciente_diagnostico);
    }

    /**
     * Display the specified resource.
     *
     * @param  paciente_diagnostico $paciente_diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show(paciente_diagnostico $paciente_diagnostico)
    {
        $doctor = doctor::where('id', '=', $paciente_diagnostico->doctor_id)->first();
        $doctor->personas_id = persona::where('id', '=', $doctor->personas_id)->first();

        $paciente_diagnostico->load([
            'pieza', 'diagnostico', 'paciente.persona', 'registrar_tratamiento',
            'estatus_tratamiento', 'consumos', 'reservas',
        ]);

        return view('diagnosticos.show', [
            'paciente_diagnostico' => $paciente_diagnostico,
            'insumos' => Insumo::options('Consumible'),
            'doctor' => $doctor
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

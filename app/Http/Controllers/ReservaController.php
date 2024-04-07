<?php

namespace App\Http\Controllers;

use App\Models\estatus_tratamiento;
use App\Models\Insumo;
use App\Models\Item;
use App\Models\Operacion;
use App\Models\paciente_diagnostico;
use App\Models\Reserva;
use App\Services\Codigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservas.index', [
            'reservas' => Reserva::with([
                'items', 'items.operacion', 'items.operacion.insumo',
            ])->search('codigo')
                ->filter()
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proceso = estatus_tratamiento::firstWhere('estatus', 'En Proceso');

        $diagnosticos = paciente_diagnostico::options($proceso);

        $insumos = Insumo::options('Equipo Médico');

        return view('reservas.create', [
            'insumos' => $insumos,
            'diagnosticos' => $diagnosticos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => ['required', 'string', 'min:10', 'max:80'],
            'paciente_diagnostico_id' => ['required', 'numeric', 'integer'],
            'insumos' => ['required', 'array', 'min:1'],
            'insumos.*' => ['array:id,cantidad'],
            'insumos.*.id' => ['numeric', 'integer'],
        ]);

        $insumos = collect($request->input('insumos'));

        $insumos->each(function ($data) {
            $insumo = Insumo::find($data['id']);

            Validator::make($data, [
                'cantidad' => ['numeric', 'integer', 'min:1', 'max:' . $insumo->existencia],
            ], ["La cantidad del insumo \"{$insumo->nombre}\" no debe ser mayor a {$insumo->existencia}"])->validate();
        });

        $reserva = Reserva::create([
            'codigo' => Codigo::generar('reserva'),
            ...$request->only(['paciente_diagnostico_id', 'descripcion'])
        ]);

        $insumos->each(function ($insumo) use ($reserva) {
            $operacion = Operacion::create([
                'insumo_id' => $insumo['id'],
                'cantidad' => -$insumo['cantidad'],
                'codigo' => Codigo::generar('operacion'),
                'codigo_rest' => Codigo::generar('operacion'),
            ]);

            Item::create([
                'reserva_id' => $reserva->id,
                'operacion_id' => $operacion->id,
            ]);
        });

        return redirect()->route('reservas.index')
        ->with('message', 'Se ha registrado una reserva correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', [
            'reserva' => $reserva->load([
                'items.operacion.insumo',
                'paciente_diagnostico.registrar_tratamiento',
                'paciente_diagnostico.paciente.persona',
            ]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {

        return view('reservas.edit', [
            'reserva' => $reserva->load([
                'items.operacion.insumo',
            ]),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'descripcion' => ['required', 'string', 'min:10', 'max:80'],
            'operaciones' => ['sometimes', 'array', 'size:' . $reserva->items->count()],
            'operaciones.*' => ['array:id,cantidad'],
            'operaciones.*.id' => ['numeric', 'integer'],
        ]);

        $operaciones = collect($request->input('operaciones'));

        if ($operaciones->isNotEmpty()) {
            $operaciones->each(function ($data) {
                $operacion = Operacion::find($data['id']);
                $insumo = $operacion->insumo;
                $max = $insumo->existencia + abs($operacion->cantidad);

                Validator::make($data, [
                    'cantidad' => ['numeric', 'integer', 'min:1', 'max:' . $max],
                ], [
                    "La cantidad del insumo \"{$insumo->nombre}\" no debe ser mayor a {$max}"
                ])->validate();

                $operacion->update([
                    'cantidad' => -$data['cantidad'],
                ]);
            });
        }

        $reserva->update([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('reservas.show', $reserva)
        ->with('message', 'Se ha actualizado una reserva correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        if (!$reserva->mutable) {
            abort(404);
        }

        $reserva->delete();

        return redirect()->route('reservas.index')
        ->with('message', 'La reserva se ha eliminado correctamente.');
    }
}

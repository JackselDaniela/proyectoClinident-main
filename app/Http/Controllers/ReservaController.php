<?php

namespace App\Http\Controllers;

use App\Models\estatus_tratamiento;
use App\Models\Insumo;
use App\Models\paciente_diagnostico;
use App\Models\Reserva;
use Illuminate\Http\Request;

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
            ])->latest()->get(),
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

        $diagnosticos = paciente_diagnostico::with([
            'paciente.persona',
            'registrar_tratamiento'
        ])
            ->where('estatus_tratamientos_id', $proceso->id)
            ->latest()->get()->map(function ($diagnostico) {
                return [
                    'id' => $diagnostico->id,
                    'nombre' => $diagnostico->paciente->persona->nombre,
                    'tratamiento' => $diagnostico->registrar_tratamiento->nom_tratamiento,
                ];
            });

        $insumos = Insumo::where('tipo', 'Equipo Médico')
            ->latest()->get();

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
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
        //
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

        return redirect()->route('reservas.index');
    }
}

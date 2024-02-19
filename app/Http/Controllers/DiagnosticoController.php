<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\paciente_diagnostico;

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
}

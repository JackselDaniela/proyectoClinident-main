<?php

namespace App\Http\Controllers;

use App\Models\paciente;

class HistoriaCController extends Controller
{
    public function buscar($id)
    {
       $paciente = paciente::with('persona','expediente','persona.dato_ubicacion')
        ->join('expedientes','expedientes.pacientes_id','=','expedientes.id')
        ->find($id);
    return view('HistoriaC', compact('paciente'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use App\Models\paciente;
use App\Models\estatus_tratamiento;
use App\Models\Insumo;
use App\Models\paciente_diagnostico;
use App\Services\Diagnostico;

class RutaTController extends Controller
{
    public function buscar($id)
    {
        //ruta de tratamiento
        // SELECT * FROM `paciente_diagnosticos` INNER JOIN registrar_tratamientos ON paciente_diagnosticos.registrar_tratamientos_id = registrar_tratamientos.id;

        $paciente = paciente::with('persona', 'expediente', 'persona.dato_ubicacion')
            ->join('expedientes', 'expedientes.pacientes_id', '=', 'expedientes.id')->where('pacientes_id', $id)
            ->find($id);
            dd($paciente);

        $estatus_tratamiento           = estatus_tratamiento::all();
        $paciente_diagnostico = paciente_diagnostico::with('pieza', 'estatus_tratamiento', 'diagnostico', 'registrar_tratamiento', 'paciente')
            //     ->join('piezas','paciente_diagnosticos.piezas_id','=','piezas.id')
            //      ->join('diagnosticos','paciente_diagnosticos.diagnosticos_id','=','diagnosticos.id')
            //     ->join('registrar_tratamientos','paciente_diagnosticos.registrar_tratamientos_id','=','registrar_tratamientos.id')
            //    ->join('estatus_tratamientos','paciente_diagnosticos.estatus_tratamientos_id','=','estatus_tratamientos.id')
            ->where('pacientes_id', $id)
            ->get();; //presupuesto de ruta de tratameinto
        $presupuesto = paciente_diagnostico::with('registrar_tratamiento', 'paciente')
            //    ->join('registrar_tratamientos','paciente_diagnosticos.registrar_tratamientos_id','=','registrar_tratamientos.id')
            //    ->join('pacientes','paciente_diagnosticos.pacientes_id','=','pacientes.id')

            ->where('pacientes_id', $id)->get();

        $presupuestoT = 0;
        foreach ($presupuesto as $presupuesto) {
            $presupuestoT += (int)(rtrim($presupuesto->registrar_tratamiento->costo_tratamiento, '$'));
        }

        //    dd($presupuesto);


        return view('RutaT', compact('paciente_diagnostico', 'paciente', 'estatus_tratamiento', 'presupuesto', 'presupuestoT', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $paciente = paciente::with('persona', 'expediente', 'persona.dato_ubicacion')
            ->join('expedientes', 'expedientes.pacientes_id', '=', 'expedientes.id')
            ->get();

        $paciente_diagnostico = paciente_diagnostico::with('pieza', 'estatus_tratamiento', 'diagnostico', 'registrar_tratamiento', 'estatus_tratamiento', 'paciente.persona')
            ->findOrFail($id);

        $insumos = Insumo::options('Consumible');

        return view('EditarRutaT', compact('paciente_diagnostico', 'paciente', 'insumos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  paciente_diagnostico $paciente_diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(paciente_diagnostico $paciente_diagnostico)
    {
        $siguiente = $paciente_diagnostico->siguiente;
        $estatus = $siguiente->estatus;

        $servicio = new Diagnostico($paciente_diagnostico);

        if ($estatus === 'En Proceso') {
            $servicio->registrarConsumos();
        } else if ($estatus === 'Terminado') {
            $servicio->restituirReservas();
        } else {
            abort(404);
        }

        Bitacora::create([
            'user_id' => auth()->user()->id,
            'action' => 'Registrar',
            'file' => 'Diagnóstico paciente'
        ]);

        $paciente_diagnostico->update([
            'estatus_tratamientos_id' => $siguiente->id,
        ]);

        return redirect()->route('RutaT.buscar', $paciente_diagnostico->paciente->id);
    }
}

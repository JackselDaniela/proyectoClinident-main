<?php

namespace App\Http\Controllers;

use App\Models\paciente;
use App\Models\paciente_diagnostico;
use App\Services\Ganancias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Bitacora;
use App\Models\Carga;
use App\Models\Insumo;
use App\Models\Operacion;
use App\Models\User;
use App\Services\Codigo;
use App\Models\Reserva;
use App\Models\Item;
use PDF;

class PDFController extends Controller
{
    public function pacientesPDF()
    {
       $paciente = paciente::all();
       $pdf = PDF::loadView('PDFpaciente', compact('paciente'));
       return $pdf->stream('paciente.pdf');
    }
    public function rutaPDF($id)
    {
        $paciente = paciente::with('persona', 'expediente', 'persona.dato_ubicacion')
        ->join('expedientes', 'expedientes.pacientes_id', '=', 'expedientes.id')->where('pacientes_id', $id)
        ->find($id);

    $paciente_diagnostico = paciente_diagnostico::with('pieza', 'diagnostico', 'registrar_tratamiento', 'paciente')
        ->where('pacientes_id', $id)
        ->get();; //presupuesto de ruta de tratameinto
    $presupuesto = paciente_diagnostico::with('registrar_tratamiento', 'paciente')
        ->where('pacientes_id', $id)->get();

    $presupuestoT = 0;
    foreach ($presupuesto as $presupuesto) {
        $presupuestoT += (int)(rtrim($presupuesto->registrar_tratamiento->costo_tratamiento, '$'));
    }
    
    $pdf = PDF::loadView('PDFRutatratamiento', compact('paciente_diagnostico','paciente', 'presupuesto', 'presupuestoT', 'id'));
    return $pdf->stream('rutatratamiento.pdf');
    }
    public function tratamientosPDF()
    {
        $tratamientos_finalizados = paciente_diagnostico::where('estatus_tratamientos_id', '=', 3)
            ->with('pieza')
            ->with('diagnostico')
            ->with('registrar_tratamiento')
            ->with('doctor')
            ->with('paciente')->get();
       $pdf = PDF::loadView('PDFtratamientosR', compact('tratamientos_finalizados'));
       return $pdf->stream('tratamientosR.pdf');
    }

    public function gananciasPDF(Request $request)
    {
        $data = Ganancias::get($request->all());

        $pdf = PDF::loadView('PDFGanancias', $data);

        return $pdf->stream('Ganancias del Doctor.pdf');
    }
    
    public function cargasPDF(Request $request)
    {
        $cargas = Carga::with('user', 'operacion', 'operacion.insumo')
            ->search('codigo')->get();

        $pdf = PDF::loadView('PDFCargas', compact('cargas'));

        return $pdf->stream('Cargas.pdf');
    }

    public function reservasPDF(Request $request) 
    { 
        $reserva = Reserva::with(
            'items', 'items.operacion', 'items.operacion.insumo','paciente_diagnostico.registrar_tratamiento',
            'paciente_diagnostico.paciente.persona'
        )->search('codigo')
            ->filter()
            ->latest()
            ->get();
    
        
        $pdf = PDF::loadView('PDFReservas', compact('reserva') );

        return $pdf->stream('Reservas.pdf');
    }
}
    
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paciente;
use App\Models\paciente_diagnostico;
use PDF;

class PDFController extends Controller
{
    public function getAllpaciente(){
        $paciente = paciente::all();
        return view ('PDFPaciente', compact('paciente'));
    }

    public function downloadPDF()
    {
       $paciente = paciente::all();
       $pdf = PDF::loadView('PDFpaciente', compact('paciente'));
       return $pdf->stream('paciente.pdf');
    }
    public function rutaPDF($id)
    {
       $paciente = paciente::all();
       $paciente_diagnostico = paciente_diagnostico::all();
       $pdf = PDF::loadView('PDFRutatratamiento', compact('paciente', 'paciente_diagnostico'));
       return $pdf->stream('rutatratamiento.pdf');
    }
}

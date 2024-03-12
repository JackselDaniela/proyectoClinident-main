<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paciente;
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
}

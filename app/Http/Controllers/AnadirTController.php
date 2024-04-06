<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paciente;
use App\Models\expediente;
use App\Models\persona;
use App\Models\pieza;

class AnadirTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pieza = pieza::All()->get();
        $pacientes = persona::All();
       return view('AnadirT',compact('pacientes','pieza'));
    }


    
    public function edit(Request $request, $id)
    {
        
        $pacientes = persona::All();
        $paciente = persona::All()
       ->where('tipo_personas','2')
       ->where('doc_identidad',$id)
       ->get();
       
        return view('AnadirT', compact('paciente','pacientes',$paciente,$pacientes));
    }
    
   
}

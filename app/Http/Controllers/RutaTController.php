<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use App\Models\persona;
use App\Models\dato_ubicacion;
use App\Models\especialidad;
use App\Models\paciente;
use App\Models\expediente;
use App\Models\pieza;
use App\Models\estatus_tratamiento;
use App\Models\registrar_tratamiento;
use App\Models\diagnostico;
use App\Models\paciente_diagnostico;

class RutaTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('RutaT'); 
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      
    }

    public function buscar($id)
    {
        //ruta de tratamiento
        // SELECT * FROM `paciente_diagnosticos` INNER JOIN registrar_tratamientos ON paciente_diagnosticos.registrar_tratamientos_id = registrar_tratamientos.id;
        
        $paciente = paciente::with('persona','expediente','persona.dato_ubicacion')
        ->join('expedientes','expedientes.pacientes_id','=','expedientes.id') ->where('pacientes_id',$id)
        ->find($id);

   $estatus_tratamiento           = estatus_tratamiento::all();
       $paciente_diagnostico = paciente_diagnostico::with('pieza','estatus_tratamiento','diagnostico','registrar_tratamiento', 'paciente')
    //     ->join('piezas','paciente_diagnosticos.piezas_id','=','piezas.id')
    //      ->join('diagnosticos','paciente_diagnosticos.diagnosticos_id','=','diagnosticos.id')
    //     ->join('registrar_tratamientos','paciente_diagnosticos.registrar_tratamientos_id','=','registrar_tratamientos.id')
    //    ->join('estatus_tratamientos','paciente_diagnosticos.estatus_tratamientos_id','=','estatus_tratamientos.id')
        ->where('pacientes_id',$id)
        ->get();
        
        

       ;//presupuesto de ruta de tratameinto
     $presupuesto= paciente_diagnostico::with('registrar_tratamiento','paciente')
    //    ->join('registrar_tratamientos','paciente_diagnosticos.registrar_tratamientos_id','=','registrar_tratamientos.id')
    //    ->join('pacientes','paciente_diagnosticos.pacientes_id','=','pacientes.id')
      
    ->where('pacientes_id',$id)  ->get();
    
    $presupuestoT = 0; 
    foreach ($presupuesto as $presupuesto) {
        $presupuestoT += (int)(rtrim
          ($presupuesto->registrar_tratamiento->costo_tratamiento, '$'));
      }
       
    //    dd($presupuesto);
       

        return view('RutaT', compact('paciente_diagnostico','paciente','estatus_tratamiento', 'presupuesto','presupuestoT','id'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function editar($id)
    {
        $paciente = paciente::with('persona','expediente','persona.dato_ubicacion')
         ->join('expedientes','expedientes.pacientes_id','=','expedientes.id')
        ->get();

        $paciente_diagnostico = paciente_diagnostico::with('pieza','estatus_tratamiento','diagnostico','registrar_tratamiento','estatus_tratamiento','paciente.persona')
        ->findOrFail($id);
       
    //    $epieza = estatus_tratamiento::find($id)
       return view('EditarRutaT', compact('paciente_diagnostico','paciente'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
     {
        $paciente = paciente::with('persona','expediente','persona.dato_ubicacion')
      ->get();
        $paciente_diagnostico = paciente_diagnostico::with('pieza','diagnostico','estatus_tratamiento','registrar_tratamiento')
        ->where('id', $id)
        ->update([
        'estatus_tratamientos_id' =>$request->estatus,
       ]);
       
        return view('RegistroE', compact('paciente','paciente_diagnostico'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\paciente;
use App\Models\persona;
use App\Models\expediente;
use App\Models\pieza;
use App\Models\estatus_tratamiento;
use App\Models\registrar_tratamiento;
use App\Models\diagnostico;
use App\Models\paciente_diagnostico;


class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('odontograma');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$piezas_id)
    {
        // SELECT * FROM empleados INNER JOIN departamentos ON empleados.e_id = departamentos.d_id;
        $pieza = pieza::find($piezas_id);
       
        $paciente = paciente::with('persona','expediente','persona.dato_ubicacion')
        ->get();
       
        $nom_pieza = $pieza->nom_pieza;
        $id_paciente = $id;

        $diagnostico           = diagnostico::all();
        $registrar_tratamiento = registrar_tratamiento::all();
       


        return view('odontograma',compact('id','id_paciente','paciente','piezas_id','nom_pieza','registrar_tratamiento','diagnostico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $piezas_id)
    {
        
         $paciente_diagnostico = paciente_diagnostico::create([
             'pacientes_id' => $id ,
             'piezas_id'=> $piezas_id,
             'diagnosticos_id'=> $request->post('diagnostico'),
             'registrar_tratamientos_id'=> $request->post('nom_tratamiento'),
             'estatus_tratamientos_id'=> 1
             

        ]);
      
        // $diagnostico = diagnostico::create([
        //     'diagnostico'    => $request->post('diagnostico'),
            
            
        // ]);
        // $registrar_tratamiento = registrar_tratamiento::create([
        //     'nom_tratamiento'    => $request->post('nom_tratamiento'),
            
            
        // ]);
      
       if ($paciente_diagnostico != null) {
                return redirect()->route('EditarP.buscar',$id);
            }else{
                return redirect()->route('EditarP.buscar',$id);
            }
        
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
    public function edit($id)
    {
        //
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
        //
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

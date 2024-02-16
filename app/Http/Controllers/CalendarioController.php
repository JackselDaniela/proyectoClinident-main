<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\cita;
use App\Models\doctor;
use App\Models\paciente;
use App\Models\tipo_consulta;
use App\Models\persona;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_consulta = tipo_consulta::get();
        $citas= cita::with('paciente','tipo_consulta','doctor')->get();
        // return $citas;
         $evento = array();
         $format = 'Y-m-d H:i:s';
         foreach ($citas as $citas){
            $inicioStr="{$citas->fecha}{$citas->inicio}";
            // dd($inicioStr); 
            $finStr="{$citas->fecha}{$citas->fin}"; 
             $evento[] = [
                
                 'start'=>Carbon::createFromFormat($format, $inicioStr),
                 'end'=>Carbon::createFromFormat($format, $finStr),
                 'title'=>$citas->descripcion,
             ];
            //  dd($citas);
         }  
         
        return view('Calendario', compact('evento','tipo_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = tipo_consulta::get();
        $regla = 'in:' . $tipo->implode('id',',');
       
       $request->validate([
        'paciente'=>['required', 'integer', 'numeric', 'digits_between:6,8',],
        'doctor'=>['required', 'integer', 'numeric', 'digits_between:6,8',],
        'descripcion'=>['required', 'string', 'alpha_num', 'min:10', 'max:250'],
        'inicio'=>['required', 'date_format:H:i', 'before_or_equal:17:00', 'after_or_equal:07:30'],
        'fin'=>['required','date_format:H:i', 'before_or_equal:18:00', 'after_or_equal:08:00', 'after:inicio'],
        'fecha'=>['required','date','after_or_equal:today','before_or_equal:+60days'],
        'tipo_cita' =>['required', $regla]
       ]) ;

       $identidad = persona::with('paciente')->where('doc_identidad',$request->post('paciente'))->first();
       $paciente = $identidad->paciente->id;
       $identificacion = persona::with('doctor')->where('doc_identidad',$request->post('doctor'))->first();
       $doctor = $identificacion->doctor->id;
// dd($cita);
       $cita = cita::create([
           
             'pacientes_id'     => $paciente,
             'doctors_id'   => $doctor,
             'tipo_consultas_id'     => $request->post('tipo_cita'),
             'inicio'   =>$request->post('inicio'),
             'fin'  =>$request->post('fin'),
             'fecha'=>$request->post('fecha'),
             'descripcion'   => $request-> post('descripcion'),
            
         ]);

         if ($cita != null) {
            return redirect()->route("Calendario");
        }else{
            return alert('Error');
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

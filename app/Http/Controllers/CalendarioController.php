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
    
    public function index()
    {
        $tipo_consulta = tipo_consulta::get();
        $citas= cita::with('paciente','tipo_consulta','doctor')->get();
        $evento = array();
        $format = 'Y-m-d H:i:s';
        
        foreach ($citas as $cita) {
            $inicioStr = "{$cita->fecha}{$cita->inicio}";
            $finStr = "{$cita->fecha}{$cita->fin}";
            $inicio = Carbon::createFromFormat($format, $inicioStr);
            $fin = Carbon::createFromFormat($format, $finStr);
            
            $evento[] = [
                'id' => $cita->id,
                'start' => $inicio,
                'end' => $fin,
                'formateado' => [
                    'fecha'  => $cita->fecha,
                    'inicio' => $inicio->format('H:i'),
                    'fin' => $fin->format('H:i'),
                ],
                'title' => $cita->descripcion,
                'tipo_consultas_id'=> $cita->tipo_consultas_id,
            ];
        } 

        return view('Calendario', compact('evento','tipo_consulta'));
    }


    public function store(Request $request)
    {
        $tipo = tipo_consulta::get();
        $regla = 'in:' . $tipo->implode('id',',');
       
       $request->validate([
        'paciente'=>['required', 'integer', 'numeric', 'digits_between:6,8',],
        'doctor'=>['required', 'integer', 'numeric', 'digits_between:6,8',],
        'descripcion'=>['required', 'string', 'min:10', 'max:250'],
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

   
    public function update(Request $request, cita $cita)
    {
        
        $tipo = tipo_consulta::get();
        $regla = 'in:' . $tipo->implode('id',',');
       
        $request->validate([
       
        'descripcion'=>['required', 'string', 'min:10', 'max:250'],
        'inicio'=>['required', 'date_format:H:i', 'before_or_equal:17:00', 'after_or_equal:07:30'],
        'fin'=>['required','date_format:H:i', 'before_or_equal:18:00', 'after_or_equal:08:00', 'after:inicio'],
        'fecha'=>['required','date','after_or_equal:today','before_or_equal:+60days'],
        'tipo_cita' =>['required', $regla]
       ]);

        $cita->update([
             'tipo_consultas_id'     => $request->post('tipo_cita'),
             'inicio'   =>$request->post('inicio'),
             'fin'  =>$request->post('fin'),
             'fecha'=>$request->post('fecha'),
             'descripcion'   => $request-> post('descripcion'),
         ]);

        return redirect()->route("Calendario");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cita $cita)
    {
        $cita->delete();
        return redirect()->route("Calendario");
    }
}

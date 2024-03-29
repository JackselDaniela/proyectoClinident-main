<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\persona;
use App\Models\Porcentaje;
use App\Models\registrar_tratamiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\paciente_diagnostico;

class GananciasAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('GananciasA');
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
        //
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

    /**
     * Muestra todas las ganancias del doctor por id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Request $request)
    {
        $request->validate([
            'date_init' => ['required'],
            'date_fin' => ['required'],
            'doctor_cedula' => ['required', 'numeric', 'integer'],
        ]);

        $date_init = $request->date_init;
        $date_fin = $request->date_fin;
        $doctor_cedula = $request->doctor_cedula;

        $persona = persona::where('doc_identidad', '=', $doctor_cedula)->first();

        if (is_null($persona)) {
            return view('GananciasA');
        }

        $doctor = doctor::where('personas_id', $persona->id)->with('persona')->first();

        if (is_null($doctor)) {
            return view('GananciasA');
        }

        $trabajos = paciente_diagnostico::where('estatus_tratamientos_id', '=', 3)
            ->where('doctor_id', '=', $doctor->id)
            ->whereDate("updated_at",'>=', $date_init)->whereDate("updated_at",'<=', $date_fin)
            ->get();

        $total = 0;
        $total_doctor = 0;
        $total_hospital = 0;

        foreach($trabajos as $trabajo) {
            $trabajo->registrar_tratamientos_id = registrar_tratamiento::where('id', '=', $trabajo->registrar_tratamientos_id)->first();

            $total += (float) $trabajo->registrar_tratamientos_id->costo_tratamiento;
        }

        $porcentaje_activo = Porcentaje::where('status', '=', '1')->first();

        if ($porcentaje_activo !== null) {
            $porcentaje_clinica = $porcentaje_activo->porcentaje_clinica / 100;
            $porcentaje_doctor = $porcentaje_activo->porcentaje_doctor / 100;

            $total_hospital = $porcentaje_clinica * $total;
            $total_doctor = $porcentaje_doctor * $total;
        }

        return view('GananciasA', [
            'trabajos' => $trabajos,
            'date_init' => $date_init,
            'date_fin' => $date_fin,
            'total_hospital' => $total_hospital,
            'total_doctor' => $total_hospital <= 0 ? $total : $total_doctor,
            'doctor' => $doctor
        ]);
    }
}

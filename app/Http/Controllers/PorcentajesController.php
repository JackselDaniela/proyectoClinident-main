<?php

namespace App\Http\Controllers;
use App\Models\registro_tratamiento;
use App\Models\especialidad_tratamiento;
use App\Models\Porcentaje;
use Illuminate\Http\Request;

class PorcentajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $porcentaje = Porcentaje::where('status', 1)->first();
        return view('Porcentajes', [ 'porcentaje' => $porcentaje ]);
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
        $porcentaje_clinica = (float)$request->post('porcentaje_clinica');
        $porcentaje_doctor = (float)$request->post('porcentaje_doctor');

        Porcentaje::where('status', 1)
            ->update(['status' => 0]);

        if ($porcentaje_doctor <= 0) {
            return redirect('/Porcentajes');
        }

        $porcentaje = new Porcentaje();
        $porcentaje->porcentaje_clinica = $porcentaje_clinica;
        $porcentaje->porcentaje_doctor = $porcentaje_doctor;

        $porcentaje->save();

        return view('Porcentajes', [
            'message' => 'Configuracion Exitosa',
            'porcentaje' => $porcentaje
        ]);
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

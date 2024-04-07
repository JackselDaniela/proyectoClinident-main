<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\persona;
use App\Models\doctor;
use App\Models\dato_ubicacion;
use App\Models\especialidad;


use Illuminate\Http\Request;

class DoctoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $doctor = doctor::with('persona', 'especialidad', 'persona.dato_ubicacion')->get();
        return view('Doctores', compact('doctor'));
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
    }
    public function eliminarD($id)
    {
        $doctor = doctor::find($id);
        $doctor->delete();

        Bitacora::create([
            'user_id' => auth()->user()->id,
            'action' => 'Borrar',
            'file' => 'Doctores'
        ]);
        return redirect()->route("Doctores")
        ->with('message', 'El registro se ha eliminado correctamente.');
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

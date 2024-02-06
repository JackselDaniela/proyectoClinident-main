<?php

namespace App\Http\Controllers;

use App\Models\gestion_u;
use App\Models\dato_ubicacion;

use Illuminate\Http\Request;

class GestionUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('GestionU');
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
        
        $clinica = new gestion_u();
        $clinica-> nom_empresa     = $request-> post('nom_empresa');
        $clinica-> fax             = $request-> post('fax');
        $clinica-> website     = $request-> post('website');
        $clinica->save();

        $clinica = new dato_ubicacion();
        $clinica-> estado     = $request-> post('estado');
        $clinica-> municipio  = $request-> post('municipio');
        $clinica-> ciudad     = $request-> post('ciudad');
        $clinica-> parroquia  = $request-> post('parroquia');
        $clinica-> direccion  = $request-> post('direccion');
        $clinica-> telefono   = $request-> post('telefono');
        $clinica-> correo     = $request-> post('correo');
        $clinica->save();
        
        if ($clinica->save()) {
            return redirect()->route("GestionU");
        }else{
            return redirect()->route("GestionU");
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

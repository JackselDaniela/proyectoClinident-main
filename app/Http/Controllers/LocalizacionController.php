<?php

namespace App\Http\Controllers;
use App\Models\localizacion;
use App\Models\zona_horaria;
use App\Models\lenguaje;
use App\Models\codigo_pago;

use Illuminate\Http\Request;

class LocalizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Localizacion');
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
        
        $clinica = new localizacion();
        $clinica-> pais          = $request-> post('pais');
        $clinica-> moneda          = $request-> post('moneda');
        $clinica->save();

        $clinica = new zona_horaria();
        $clinica-> zona_horaria           = $request-> post('zona_horaria');
        $clinica->save();
        

        $clinica = new lenguaje();
        $clinica-> lenguaje           = $request-> post('lenguaje');
        $clinica->save();
        
        $clinica = new codigo_pago();
        $clinica-> codigo_pago           = $request-> post('codigo_pago');
        $clinica->save();

        $clinica->save();
        if ($clinica->save()) {
                return redirect()->route("Localizacion");
            }else{
                return redirect()->route("Localizacion");
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

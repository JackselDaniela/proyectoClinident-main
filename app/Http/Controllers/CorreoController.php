<?php

namespace App\Http\Controllers;
use App\Models\correo;
use App\Models\smtp_config;

use Illuminate\Http\Request;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Correo');
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
        
        $correo = new correo();
        $correo-> correo_protocolo     = $request-> post('correo_protocolo');
        $correo-> correo_emisor     = $request-> post('correo_emisor');
        $correo-> nombre_emisor     = $request-> post('nombre_emisor');
        $correo-> host_protocolo     = $request-> post('host_protocolo');
        $correo-> protocolo_usuario     = $request-> post('protocolo_usuario');
        $correo-> protocolo_config     = $request-> post('protocolo_config');
        $correo-> protocolo_puerto     = $request-> post('protocolo_puerto');
        $correo-> protocolo_dominio     = $request-> post('protocolo_dominio');
        $correo->save();
        
        $correo = new smtp_config();
        $correo-> smtp_config     = $request-> post('smtp_config');
        $correo->save();
       
        if ($correo->save()) {
                return redirect()->route("Correo");
            }else{
                return redirect()->route("Correo");
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

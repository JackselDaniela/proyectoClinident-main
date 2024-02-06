<?php

namespace App\Http\Controllers;
use App\Models\Soicitud_i;

use Illuminate\Http\Request;

class SolicitudIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('SolicitudI'); 
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

        $this->validate($request,[
            
            'nom_insumo' => 'required|alpha|max:30',
            'cod_insumo' => 'required|max:30',
            'elaboracion_insumo' => 'required|date',
            'vencimiento_insumo' => 'required|date',
            'serial_insumo' => 'required|max:10',
            'descripcion_insumo' => 'required|alpha|max:100',
            
           
     
                 
            ]);
        $insumo = new soicitud_i();
        $insumo-> nom_insumo           = $request-> post('nom_insumo');
        $insumo-> cod_insumo           = $request-> post('cod_insumo');
        $insumo-> presentacion_insumo  = $request-> post('presentacion_insumo');
        $insumo-> elaboracion_insumo   = $request-> post('elaboracion_insumo');
        $insumo-> vencimiento_insumo   = $request-> post('vencimiento_insumo');
        $insumo-> serial_insumo        = $request-> post('serial_insumo');
        $insumo-> descripcion_insumo   = $request-> post('descripcion_insumo');
        $insumo-> funcion_insumo       = $request-> post('funcion_insumo');
        $insumo-> foto_insumo          = $request-> post('foto_insumo');
       
        $insumo->save();
        if ($insumo->save()) {
                return redirect()->route("SolicitudI");
            }else{
                return redirect()->route("SolicitudI");
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

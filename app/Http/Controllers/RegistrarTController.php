<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\registrar_tratamiento;
use App\Models\especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RegistrarTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidad = especialidad::all();
        $tratamiento = registrar_tratamiento::with('especialidad')

            ->get();

        return view('registrarT', compact('tratamiento', 'especialidad'));
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
        $especialidad = especialidad::all();


        $tratamiento = registrar_tratamiento::create([
            'nom_tratamiento'    => $request->post('nom_tratamiento'),
            'costo_tratamiento'  => $request->post('costo_tratamiento'),
            'codigo_tratamiento' => $request->post('codigo_tratamiento'),
            'fecha_añadido'      => $request->post('fecha_añadido'),
            'especialidads_id'   => $request->post('especialidad')
        ]);

        Bitacora::create([
            'user_id' => auth()->user()->id,
            'action' => 'Registrar',
            'file' => 'Tratamiento'
        ]);



        if ($tratamiento != null) {
            return redirect()->route("RegistrarT", compact('especialidad'))
            ->with('message', 'Se ha creado el registro correctamente.');
        } else {
            return redirect()->route("RegistrarT");
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
    public function editarT($id)
    {
        $especialidad = especialidad::all();
        $tratamiento = registrar_tratamiento::with('especialidad')
            ->find($id);
        // dd($tratamiento);
        return view('EregistrarT', compact('tratamiento', 'especialidad'))
        ->with('message', 'Se ha actualizado el registro correctamente.');
    }
    public function eliminarT($id)
    {
        $tratamiento = registrar_tratamiento::find($id);
        $tratamiento->delete();
        return redirect()->route("RegistrarT")
        ->with('eliminar','ok');
    }

    /**
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
        $especialidad = especialidad::first();
        $tratamiento = DB::table('registrar_tratamientos')
            ->where('id', $id)
            ->update([
                'nom_tratamiento' => $request->nom_tratamiento,
                'costo_tratamiento' => $request->costo_tratamiento,
                'codigo_tratamiento' => $request->codigo_tratamiento,
                'fecha_añadido' => $request->fecha_añadido,
                'especialidads_id' => $request->especialidad
            ]);

        Bitacora::create([
            'user_id' => auth()->user()->id,
            'action' => 'Actualizar',
            'file' => 'Tratamiento'
        ]);
        return redirect()->route("RegistrarT", compact('tratamiento', 'especialidad'))
        ->with('message', 'Se ha actualizado el registro correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}

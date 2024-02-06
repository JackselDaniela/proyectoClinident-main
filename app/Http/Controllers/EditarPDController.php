<?php

namespace App\Http\Controllers;
use App\Models\persona;
use App\Models\dato_ubicacion;
use App\Models\especialidad;
use App\Models\doctor;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

class EditarPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $doctor = doctor::with('persona','especialidad','persona.dato_ubicacion')->get();
        // return view('EditarPD',compact('doctor'));
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
       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = doctor::with('persona','especialidad','persona.dato_ubicacion')
            ->find($id);
        
        return view('EditarPD', [
            'doctor' => $doctor,
        ]);
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
        // dd($request->all());
        $doctor = DB::table('especialidads')
         -> update([
            'especialidad'=>$request->especialidad,
            
         ]);

         $doctor = DB::table('doctors')->where('id', $id)
         -> update([
            'universidad'=>$request ->universidad,
            'destacado'=>$request -> destacado,
         ]);

         $doctor = doctor::with('persona')
            ->findOrFail($id);
         
         $doctor = DB::table('personas')->where('id', $doctor->personas_id)
            ->update([
            'nombre'=>$request -> nombre,
            'apellido'=>$request -> apellido,
            'fecha_nacimiento'=>$request -> fecha_nacimiento,
            'genero'=>$request -> genero,
            
        ]);
         $doctor = DB::table('dato_ubicacions')
         -> update([
            'direccion'=>$request -> direccion,
            'estado'=>$request -> estado,
            'telefono'=>$request -> telefono,
            
         ]);
         
        return redirect()->route("Doctores");

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

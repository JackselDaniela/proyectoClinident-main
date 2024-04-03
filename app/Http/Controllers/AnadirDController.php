<?php

namespace App\Http\Controllers;

use App\Models\persona;
use App\Models\dato_ubicacion;
use App\Models\doctor;
use App\Models\especialidad;
use App\Models\tipo_persona;
use App\Models\estado;
use App\Models\municipio;
use App\Models\ciudad;
use App\Models\parroquia;
use App\Models\nacionalidad;
use App\Models\User;



use Illuminate\Http\Request;

class AnadirDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidad = especialidad::all();
        $nacionalidad = nacionalidad::all();
        $estado = estado::all();
        $municipio = municipio::all();
        $ciudad = ciudad::all();
        $parroquia = parroquia::all();


        return view('AñadirD', compact('especialidad', 'estado', 'municipio', 'parroquia', 'ciudad', 'nacionalidad'));
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
    public function buscar($estadoId)
    {

        $estado = estado::find($estadoId);
        return [
            'municipios' => municipio::where('id_estado', $estado->id_estado)->get(),
            'ciudades' => ciudad::where('id_estado', $estado->id_estado)->get()
        ];
    }

    public function buscarParroquia($municipioId)
    {

        $municipio = municipio::find($municipioId);
        return parroquia::where('id_municipio', $municipio->id_municipio)->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $estado = estado::where('id_estado', '=', $request->estado)->first();
        $municipio = municipio::where('id_municipio', '=', $request->municipio)->first();
        $ciudad = ciudad::where('id_ciudad', '=', $request->ciudad)->first();
        $parroquia = parroquia::where('id_parroquia', '=', $request->parroquia)->first();

        $dato_ubicacion = dato_ubicacion::create([

            'estados_id'     =>  $estado->id_estado,
            'municipios_id'   =>  $municipio->id_municipio,
            'ciudades_id'     =>  $ciudad->id_ciudad,
            'parroquias_id'   =>  $parroquia->id_parroquia,
            'direccion'  => $request->post('direccion'),
            'telefono'   => $request->post('telefono'),
        ]);
        $user = User::create([
            'email' => $request->post('correo'),
            'password' => bcrypt($request->post('contraseña')),

        ]);
        $tipo = tipo_persona::where('tipo_persona', 'Doctor')->first();

        if (isset($request->foto)) {
            $path = $request->file('foto')->storeAs('imagenes', \Carbon\Carbon::now()->timestamp . '.jpg', 'public');
            $path = substr($path, 9);
        }

        $persona = persona::create([
            'nacionalidads_id' => $request->post('nacionalidad'),
            'user_id'          => $user->id,
            'doc_identidad'    => $request->post('doc_identidad'),
            'nombre'           => $request->post('nombre'),
            'apellido'         => $request->post('apellido'),
            'fecha_nacimiento' => $request->post('fecha_nacimiento'),
            'genero'           => $request->post('genero'),
            'foto'             => $path,
            'tipo_personas_id' => $tipo->id,
            'dato_ubicacions_id' => $dato_ubicacion->id,
        ]);

        $esp = especialidad::where('id', $request->post('especialidad'))->first();
        $especialidad = $esp->id;
        $doctor =  doctor::create([

            'universidad'          => $request->post('universidad'),
            'experiencia'          => $request->post('experiencia'),
            'bachillerato'          => $request->post('bachillerato'),
            'destacado'          => $request->post('destacado'),
            'especialidads_id' => $especialidad,
            'personas_id' => $persona->id,
        ]);




        if ($doctor != null) {
            return redirect()->route("Doctores");
        } else {
            return redirect()->route("AnadirD");
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

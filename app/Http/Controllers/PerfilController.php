<?php

namespace App\Http\Controllers;

use App\Models\especialidad;
use App\Models\estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user()->persona;
        $estados = estado::select('id_estado', 'estado')->get();

        if (isset($usuario->doctor)) {
            $especialidades = especialidad::select('id', 'especialidad')->get();
            return view('Perfil', compact('usuario', 'estados', 'especialidades'));
        }

        return view('Perfil', compact('usuario', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Busca el usuario conectado, la relación user - persona
        $usuario = auth()->user()->persona;
        // Selecciona el campo "foto"
        $path = $usuario->foto;

        // Si el usuario manda una foto entonces se actualiza
        if ($request->hasFile('foto')) {
            // Selecciona la foto anterior
            $foto_anterior = $path;
            // Guarda la foto en la carpeta /storage/app/public/imagenes
            $path = $request->file('foto')->storeAs('imagenes', \Carbon\Carbon::now()->timestamp . '.jpg', 'public');
            // Borra la foto anterior
            Storage::delete('public/imagenes/' . $foto_anterior);
            $path = substr($path, 9);
        }

        // Actualiza los datos del usuario en la tabla "persona"
        $usuario->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'foto' => $path
        ]);

        // Actualiza los datos del usuario en la tabla "dato_ubicacion"
        $usuario->dato_ubicacion->update([
            'direccion' => $request->direccion,
            'estados_id' => $request->estado,
            'telefono' => $request->telefono,
        ]);

        if (isset($usuario->doctor)) {
            $usuario->doctor->update([
                'destacado' => $request->destacado,
                'universidad' => $request->universidad,
                'bachillerato' => $request->bachillerato,
                'experiencia' => $request->experiencia,
                'especialidads_id' => $request->especialidad,
            ]);
        }

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\doctor;
use App\Models\persona;
use App\Models\dato_ubicacion;
use App\Models\especialidad;
use App\Models\paciente;
use App\Models\paciente_diagnostico;
use App\Models\expediente;
use App\Models\pieza;
use App\Models\estado;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Str;

class EditarPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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
        $estado = estado::all();
        $paciente = paciente::with('persona', 'expediente', 'persona.dato_ubicacion')
            ->join('expedientes', 'expedientes.pacientes_id', '=', 'expedientes.id')
            ->find($id);
        return view('EditarP', compact('id', 'paciente', 'estado'));
    }
    public function buscar($id)
    {
        $pieza = pieza::all();
        $diagnosticos = paciente_diagnostico::where('pacientes_id', $id)->get();
        // dd($diagnosticos);
        $paciente = paciente::with('persona', 'expediente', 'persona.dato_ubicacion')
            ->join('expedientes', 'expedientes.pacientes_id', '=', 'expedientes.id')
            ->find($id);

        $doctores = doctor::all();

        foreach ($doctores as $doctor) {
            $doctor->personas_id = persona::where('id', '=', $doctor->personas_id)->first();
        }

        return view('AnadirT', compact('paciente', 'pieza', 'id', 'diagnosticos', 'doctores'));

        return view('AnadirT', compact('paciente', 'pieza', 'id', 'diagnosticos'));
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
        $paciente = DB::table('pacientes')->where('id', $id)
            ->update([
                'ocupacion' => $request->ocupacion
            ]);

        $paciente = paciente::with('persona')
            ->findOrFail($id);

        $foto_anterior = $paciente->persona->foto;
        $path = $foto_anterior;
        if (isset($foto_anterior)) {
            $path = $request->file('foto')->storeAs('imagenes', \Carbon\Carbon::now()->timestamp . '.jpg', 'public');
            $path = substr($path, 9);
            Storage::delete('public/imagenes/' . $foto_anterior);
        }

        $paciente = DB::table('personas')->where('id', $paciente->personas_id)
            ->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'genero' => $request->genero,
                'foto' => $path

            ]);
        $paciente = DB::table('dato_ubicacions')
            ->update([
                'direccion' => $request->direccion,
                'estados_id' => $request->estado,
                'telefono' => $request->telefono,

            ]);


        $paciente = DB::table('expedientes')->where('id', $id)
            ->update([
                'alergia_penicilina'        => $request->alergia_penicilina,
                'desc_alergia_p'           => $request->desc_alergia_p,
                'alergia_medicamento'      => $request->alergia_medicamento,
                'desc_alergia_m'           => $request->desc_alergia_m,
                'trat_actual'              => $request->trat_actual,
                'desc_trat_actual'         => $request->desc_trat_actual,
                'gravidez'                 => $request->gravidez,
                'desc_gravidez'            => $request->desc_gravidez,
                'hemorragia'               => $request->hemorragia,
                'desc_hemorragia'          => $request->desc_hemorragia,
                'desmayos'                 => $request->desmayos,
                'desc_desmayos'            => $request->desc_desmayos,
                'asma'                     => $request->asma,
                'desc_asma'                => $request->desc_asma,
                'diabetes'                 => $request->diabetes,
                'desc_diabetes'            => $request->desc_diabetes,
                'hipertension'             => $request->hipertension,
                'desc_hipertension'        => $request->desc_hipertension,
                'epilepsia'                => $request->epilepsia,
                'desc_epilepsia'           => $request->desc_epilepsia,
                'cancer_actual'            => $request->cancer_actual,
                'desc_cancer_actual'       => $request->desc_cancer_actual,
                'cancer_pasado'            => $request->cancer_pasado,
                'desc_cancer_pasado'       => $request->desc_cancer_pasado,
                'vih'                      => $request->vih,
                'desc_vih'                 => $request->desc_vih,
                'inmunodeficiente'         => $request->inmunodeficiente,
                'desc_inmunodeficiente'    => $request->desc_inmunodeficiente,
                'fumador'                  => $request->fumador,
                'desc_fumador'             => $request->desc_fumador,

            ]);

        Bitacora::create([
            'user_id' => auth()->user()->id,
            'action' => 'Actualizar',
            'file' => 'Paciente'
        ]);



        return redirect()->route("RegistroE");
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

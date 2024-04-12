<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\doctor;
use App\Models\persona;
use Illuminate\Http\Request;
use App\Models\paciente;
use App\Models\pieza;
use App\Models\registrar_tratamiento;
use App\Models\diagnostico;
use App\Models\paciente_diagnostico;

class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('odontograma');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $piezas_id)
    {
        // SELECT * FROM empleados INNER JOIN departamentos ON empleados.e_id = departamentos.d_id;
        $pieza = pieza::find($piezas_id);

        $paciente = paciente::with('persona', 'expediente', 'persona.dato_ubicacion')
            ->join('expedientes', 'expedientes.pacientes_id', '=', 'expedientes.id')
            ->find($id);

        $nom_pieza = $pieza->nom_pieza;
        $id_paciente = $id;

        $diagnostico           = diagnostico::all();
        $registrar_tratamiento = registrar_tratamiento::all();

        $doctores = doctor::all();

        foreach ($doctores as $doctor) {
            $doctor->personas_id = persona::where('id', '=', $doctor->personas_id)->first();
        }


        return view('odontograma', compact('id', 'id_paciente', 'paciente', 'piezas_id', 'nom_pieza', 'registrar_tratamiento', 'diagnostico', 'doctores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $piezas_id)
    {
        $request->validate([
            'diagnosticos_id' => ['required', 'numeric', 'integer'],
            'registrar_tratamientos_id' => ['required', 'numeric', 'integer'],
            'doctor_cedula' => ['required', 'numeric', 'integer','exists:personas,doc_identidad'],
        ]);

        $doctor_cedula = $request->post('doctor_cedula');

        $persona = persona::where('doc_identidad', '=', $doctor_cedula)->first();

        $errors_user = ['not_found' => 'Usuario no encontrado'];

        if (is_null($persona)) {
            return back()->withInput();
        }

        $doctor = doctor::where('personas_id', '=', $persona->id)->first();

        if (is_null($doctor)) {
            return back()->withInput();
        }

        paciente_diagnostico::create([
            'pacientes_id' => $id,
            'piezas_id' => $piezas_id,
            'doctor_id' => $doctor->id,
            'diagnosticos_id' => $request->post('diagnosticos_id'),
            'registrar_tratamientos_id' => $request->post('registrar_tratamientos_id'),
            'estatus_tratamientos_id' => 1
        ]);

        Bitacora::create([
            'user_id' => auth()->user()->id,
            'action' => 'Registrar',
            'file' => 'Odontograma'
        ]);

        return redirect()->route('EditarP.buscar', $id);
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

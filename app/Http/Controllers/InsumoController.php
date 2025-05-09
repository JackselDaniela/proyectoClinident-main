<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use App\Models\Operacion;
use App\Models\Insumo;
use App\Models\User;
use App\Services\Codigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('insumos.index', [
            'insumos' => Insumo::with('operaciones')
                ->filter('tipo')
                ->search('codigo')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insumos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:30', Rule::unique('insumos')],
            'descripcion' => ['required', 'string', 'min:10', 'max:80'],
            'tipo' => ['required', 'string', 'in:Consumible,Equipo Médico'],
            'minimo' => ['required', 'numeric', 'integer', 'min:1', 'max:100'],
            'carga' => 'sometimes',
            'cantidad' => ['required_with:carga', 'numeric', 'integer', 'min:1', 'max:1000'],
            'elaboracion' => ['required_with:carga', 'date', 'before_or_equal:today'],
            'vencimiento' => ['sometimes', 'required_if:carga,on', 'required_if:tipo,Consumible', 'date', 'after:today', 'after:elaboracion'],
        ]);

        $insumo = Insumo::create([
            ...$request->only(['nombre', 'descripcion', 'minimo', 'tipo']),
            'codigo' => Codigo::generar('insumo'),
        ]);

        $redirect = redirect()->route('insumos.index')->with('message', 'Se ha creado el registro correctamente.');

        if (!$request->has('carga')) {
            return $redirect;
        }
        
        $operacion = Operacion::create([
            'cantidad' => $request->input('cantidad'),
            'insumo_id' => $insumo->id,
            'codigo' => Codigo::generar('operacion'),
            'codigo_rest' => Codigo::generar('operacion'),
        ]);

        Carga::create([
            ...$request->only(['elaboracion', 'vencimiento']),
            'codigo' => Codigo::generar('carga'),
            'operacion_id' => $operacion->id,
            'user_id' => Auth::user()->id,
        ]);

        return $redirect;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Insumo $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', [
            'insumo' => $insumo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Insumo $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:30', Rule::unique('insumos')->ignoreModel($insumo)],
            'descripcion' => ['required', 'string', 'min:10', 'max:80'],
            'minimo' => ['required', 'numeric', 'integer', 'min:1', 'max:100'],
        ]);

        $insumo->update($data);

        return redirect()->route('insumos.index')
        ->with('message', 'Se ha actualizado el registro correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Insumo $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        $insumo->delete();

        return redirect()->route('insumos.index')
        ->with('eliminar','ok');
    }
}

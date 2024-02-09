<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use App\Models\Operacion;
use App\Models\Insumo;
use App\Models\User;
use App\Services\Codigo;
use Illuminate\Http\Request;
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
            'carga' => 'sometimes',
            'cantidad' => ['required_with:carga', 'numeric', 'integer', 'min:1', 'max:1000'],
            'elaboracion' => ['required_with:carga', 'date', 'before:today'],
            'vencimiento' => ['sometimes', 'required_if:carga,on', 'required_if:tipo,Consumible', 'date', 'before:today', 'after:elaboracion'],
        ]);

        $insumo = Insumo::create([
            ...$request->only(['nombre', 'descripcion']),
            'codigo' => Codigo::generar('insumo'),
        ]);

        $redirect = redirect()->route('insumos.index');

        if (!$request->has('carga')) {
            return $redirect;
        }
        
        $operacion = Operacion::create([
            'cantidad' => $request->input('cantidad'),
            'insumo_id' => $insumo->id,
        ]);

        Carga::create([
            ...$request->only(['elaboracion', 'vencimiento']),
            'codigo' => Codigo::generar('carga'),
            'operacion_id' => $operacion->id,
            // TODO -> poner el usuario actual cuando haya auth
            'user_id' => User::first()->id,
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
        ]);

        $insumo->update($data);

        return redirect()->route('insumos.index');
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

        return redirect()->route('insumos.index');
    }
}

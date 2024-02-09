<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use App\Models\Operacion;
use App\Models\Suministro;
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
            'insumos' => Suministro::with('operaciones')
                ->where('tipo', 'Insumo')
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
            'nombre' => ['required', 'string', 'min:5', 'max:30', Rule::unique('suministros')],
            'descripcion' => ['required', 'string', 'min:10', 'max:80'],
            'carga' => 'sometimes',
            'cantidad' => ['required_with:carga', 'numeric', 'integer', 'min:1', 'max:1000'],
            'elaboracion' => ['required_with:carga', 'date', 'before:today'],
            'vencimiento' => ['required_with:carga', 'date', 'before:today', 'after:elaboracion']
        ]);

        $insumo = Suministro::create([
            ...$request->only(['nombre', 'descripcion']),
            'codigo' => Codigo::generar('insumo'),
            'tipo' => 'Insumo',
        ]);

        $redirect = redirect()->route('insumos.index');

        if ($request->input('carga') === null) {
            return $redirect;
        }
        
        $operacion = Operacion::create([
            'cantidad' => $request->input('cantidad'),
            'suministro_id' => $insumo->id,
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
     * @param  Suministro $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Suministro $insumo)
    {
        return view('insumos.edit', [
            'insumo' => $insumo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Suministro $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suministro $insumo)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:30', Rule::unique('suministros')->ignoreModel($insumo)],
            'descripcion' => ['required', 'string', 'min:10', 'max:80'],
        ]);

        $insumo->update($data);

        return redirect()->route('insumos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Suministro $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suministro $insumo)
    {
        $insumo->delete();

        return redirect()->route('insumos.index');
    }
}

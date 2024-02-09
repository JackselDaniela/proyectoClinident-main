<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use App\Models\Operacion;
use App\Models\Suministro;
use App\Models\User;
use App\Services\Codigo;
use Illuminate\Http\Request;

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
            'nombre' => ['required', 'string', 'min:5', 'max:30'],
            'descripcion' => ['required', 'string', 'min:10', 'max:80'],
            'carga' => 'sometimes',
            'cantidad' => ['required_with:carga', 'numeric', 'integer', 'min:1', 'max:1000'],
            'elaboracion' => ['required_with:carga', 'date', 'before:today'],
            'vencimiento' => ['required_with:carga', 'date', 'before:today', 'after:elaboracion']
        ]);

        $suministro = Suministro::create([
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
            'suministro_id' => $suministro->id,
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

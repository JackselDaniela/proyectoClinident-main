<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use App\Models\Insumo;
use App\Models\Operacion;
use App\Models\User;
use App\Services\Codigo;
use Illuminate\Http\Request;

class CargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $insumoId = $request->query('insumo_id');
        $codigo = $request->query('codigo');
        $insumo = Insumo::find($insumoId);

        if ($insumo === null && $insumoId !== null) {
            abort(404);
        } else if ($codigo !== null) {
            $insumo = Insumo::firstWhere('codigo', "INS-$codigo");
        }

        return view('cargas.create', [
            'insumo' => $insumo,
            'codigo' => $codigo,
            'insumoId' => $insumoId,
        ]);
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
            'cantidad' => ['required', 'numeric', 'integer', 'min:1', 'max:1000'],
            'elaboracion' => ['required', 'date', 'before:today'],
            'vencimiento' => ['sometimes', 'date', 'before:today', 'after:elaboracion'],
            'insumo_id' => ['required', 'string', 'numeric', 'integer'],
        ]);

        $operacion = Operacion::create($request->only(['cantidad', 'insumo_id']));

        Carga::create([
            ...$request->only(['elaboracion', 'vencimiento']),
            'codigo' => Codigo::generar('carga'),
            'operacion_id' => $operacion->id,
            // TODO -> poner el usuario actual cuando haya auth
            'user_id' => User::first()->id,
        ]);

        return redirect()->route('cargas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function show(Carga $carga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function edit(Carga $carga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carga $carga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carga $carga)
    {
        //
    }
}

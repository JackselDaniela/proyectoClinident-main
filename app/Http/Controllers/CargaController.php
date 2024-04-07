<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Carga;
use App\Models\Insumo;
use App\Models\Operacion;
use App\Models\User;
use App\Services\Codigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cargas.index', [
            'cargas' => Carga::with('user', 'operacion', 'operacion.insumo')
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
    public function create(Request $request)
    {
        $id = $request->query('insumo_id');
        $insumo = Insumo::find($id);

        if ($id !== null && $insumo === null) {
            abort(404);
        }

        return view('cargas.create', [
            'insumo' => $insumo,
            'insumos' => Insumo::options(),
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
            'elaboracion' => ['required', 'date', 'before_or_equal:today'],
            'vencimiento' => ['sometimes', 'date', 'after:today', 'after:elaboracion'],
            'insumo_id' => ['required', 'string', 'numeric', 'integer'],
        ]);

        $operacion = Operacion::create([
            ...$request->only(['cantidad', 'insumo_id']),
            'codigo' => Codigo::generar('operacion'),
            'codigo_rest' => Codigo::generar('operacion'),
        ]);

        Carga::create([
            ...$request->only(['elaboracion', 'vencimiento']),
            'codigo' => Codigo::generar('carga'),
            'operacion_id' => $operacion->id,
            'user_id' => Auth::user()->id,
        ]);

        Bitacora::create([
            'user_id' => auth()->user()->id,
            'action' => 'Registrar',
            'file' => 'Carga'
        ]);

        return redirect()->route('cargas.index')
        ->with('message', 'Se ha registrado una carga correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function edit(Carga $carga)
    {
        return view('cargas.edit', [
            'carga' => $carga,
        ]);
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
        $data = $request->validate([
            'cantidad' => ['sometimes', 'numeric', 'integer', 'min:1', 'max:1000', 'exclude'],
            'elaboracion' => ['required', 'date', 'before_or_equal:today'],
            'vencimiento' => ['sometimes', 'date', 'after:today', 'after:elaboracion'],
        ]);

        if ($request->has('cantidad') && $carga->mutable) {
            $carga->operacion()->update([
                'cantidad' => $request->input('cantidad'),
            ]);
        }

        $carga->update($data);

        Bitacora::create([
            'user_id' => auth()->user()->id,
            'action' => 'Actualizar',
            'file' => 'Carga'
        ]);

        return redirect()->route('cargas.index')
        ->with('message', 'Se ha actualizado el registro de carga correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carga $carga)
    {
        if (!$carga->mutable) {
            abort(404);
        }

        $carga->delete();

        Bitacora::create([
            'user_id' => auth()->user()->id,
            'action' => 'Borrar',
            'file' => 'Carga'
        ]);

        return redirect()->route('cargas.index')
        ->with('message', 'La carga se ha eliminado correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Operacion;

class OperacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $operaciones = collect();

        Operacion::with([
            'consumo', 'insumo', 'item', 'carga', 'item.reserva'
        ])->get()->each(function ($operacion) use ($operaciones) {
            $restituido = $operacion->item === null
                || $operacion->item->reserva->restitucion === null;

            if ($restituido) {
                $operaciones->push($operacion);
                return;
            }

            $operaciones->push($operacion);

            $restitucion = $operacion->replicate();

            $restitucion->created_at = $operacion->item->reserva->restitucion;
            $restitucion->cantidad = abs($operacion->cantidad);
            $restitucion->replicado = true;

            $operaciones->push($restitucion);
        });

        return view('operaciones.index', [
            'operaciones' => $operaciones->sortByDesc('created_at'),
        ]);
    }
}

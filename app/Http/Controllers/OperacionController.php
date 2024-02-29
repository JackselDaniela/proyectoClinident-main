<?php

namespace App\Http\Controllers;

use App\Models\Operacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OperacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $search = $request->query('search');
        $filtro = $request->query('operacion');

        $operaciones = Operacion::historial()
            ->filter(function ($op) use ($search, $filtro) {
                $searched = true;
                $filtered = true;

                if ($search !== null) {
                    $searched = Str::of($op->codigo)
                        ->lower()
                        ->contains(Str::lower($search));
                }

                if ($filtro === 'Entradas') {
                    $filtered = $op->cantidad > 0;
                } else if ($filtro === 'Salidas') {
                    $filtered = $op->cantidad < 0;
                }

                return $searched && $filtered;
            });

        return view('operaciones.index', [
            'operaciones' => $operaciones,
        ]);
    }
}

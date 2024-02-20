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
                $passes = true;

                if ($search !== null) {
                    $passes = Str::of($op->codigo)
                        ->lower()
                        ->contains(Str::lower($search));
                }

                if ($filtro === 'Entradas') {
                    $passes = $op->cantidad > 0;
                } else if ($filtro === 'Salidas') {
                    $passes = $op->cantidad < 0;
                }

                return $passes;
            });

        return view('operaciones.index', [
            'operaciones' => $operaciones,
        ]);
    }
}

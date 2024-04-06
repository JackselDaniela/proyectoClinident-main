<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Ganancias;

class GananciasAController extends Controller
{
    public function index()
    {
        return view('GananciasA');
    }

    public function mostrar(Request $request)
    {
        $data = $request->validate([
            'date_init' => ['required'],
            'date_fin' => ['required'],
            'doctor_cedula' => ['required', 'numeric', 'integer','exists:personas,doc_identidad'],
        ]);

        $ganacias = Ganancias::get($data);

        return view('GananciasA', $ganacias);
    }
}

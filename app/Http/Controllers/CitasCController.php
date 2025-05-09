<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\cita;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CitasCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = cita::where('confirmacion', '!=', null)->get();
        return view('CitasC', compact('citas'));
    }

    public function validar(string $token, Request $request)
    {
        $cita = cita::where('token', '=', $token)->first();

        if (Carbon::now()->diffInDays($cita->fecha) <= 3) {
            $validacion = $request->validacion;

            if ($validacion === 'confirmar') {
                $cita->update([
                    'confirmacion' => Carbon::now()
                ]);

                Bitacora::create([
                    'user_id' => auth()->user()->id,
                    'file' => 'Cita',
                    'action' => 'Confirmar',
                ]);

                return back()->with('success', 'La cita ha sido confirmada con éxito');
            } else {
                $cita->delete();
                Bitacora::create([
                    'user_id' => auth()->user()->id,
                    'file' => 'Cita',
                    'action' => 'Rechazar',
                ]);
                return back()->with('danger', 'La cita ha sido eliminada con éxito');
            }
        } else {
            return back()->with('warning', 'La cita se ha vencido');
        }
    }

    public function cita(string $token)
    {
        $cita = cita::where('token', '=', $token)->first();
        if (Carbon::now()->diffInDays($cita->fecha) <= 3 && isset($cita)) {
            return view('ValidarCita', compact('cita'));
        } else {
            $info = 'Esta cita se ha vencido, solicite una nueva';
            return view('ValidarCita', compact('info'));
        }
    }
}

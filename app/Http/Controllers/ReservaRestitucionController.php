<?php

namespace App\Http\Controllers;

use App\Models\Reserva;

class ReservaRestitucionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Reserva $reserva)
    {
        $reserva->update([
            'restitucion' => now(),
        ]);

        return redirect()->route('reservas.show', $reserva);
    }
}

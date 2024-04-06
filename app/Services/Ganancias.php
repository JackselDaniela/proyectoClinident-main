<?php

namespace App\Services;

use App\Models\doctor;
use App\Models\paciente_diagnostico;
use App\Models\persona;
use App\Models\Porcentaje;
use App\Models\registrar_tratamiento;

class Ganancias
{
    public static function get($params)
    {
        $date_init = $params['date_init'];
        $date_fin = $params['date_fin'];
        $doctor_cedula = $params['doctor_cedula'];

        $persona = persona::where('doc_identidad', '=', $doctor_cedula)->first();

        if (is_null($persona)) {
            return view('GananciasA');
        }

        $doctor = doctor::where('personas_id', $persona->id)->with('persona')->first();

        if (is_null($doctor)) {
            return view('GananciasA');
        }

        $trabajos = paciente_diagnostico::where('estatus_tratamientos_id', '=', 3)
            ->where('doctor_id', '=', $doctor->id)
            ->whereDate("updated_at",'>=', $date_init)->whereDate("updated_at",'<=', $date_fin)
            ->get();

        $total = 0;
        $total_doctor = 0;
        $total_hospital = 0;

        foreach($trabajos as $trabajo) {
            $trabajo->registrar_tratamientos_id = registrar_tratamiento::where('id', '=', $trabajo->registrar_tratamientos_id)->first();

            $total += (float) $trabajo->registrar_tratamientos_id->costo_tratamiento;
        }

        $porcentaje_activo = Porcentaje::where('status', '=', '1')->first();

        if ($porcentaje_activo !== null) {
            $porcentaje_clinica = $porcentaje_activo->porcentaje_clinica / 100;
            $porcentaje_doctor = $porcentaje_activo->porcentaje_doctor / 100;

            $total_hospital = $porcentaje_clinica * $total;
            $total_doctor = $porcentaje_doctor * $total;
        }

        return [
            'trabajos' => $trabajos,
            'date_init' => $date_init,
            'date_fin' => $date_fin,
            'total_hospital' => $total_hospital,
            'total_doctor' => $total_hospital <= 0 ? $total : $total_doctor,
            'doctor' => $doctor
        ];
    }
}

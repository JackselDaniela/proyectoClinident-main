<?php

namespace App\Services;

use App\Models\Carga;
use App\Models\Insumo;
use App\Models\Operacion;
use App\Models\Reserva;

class Codigo
{
    public static function generar($tipo)
    {
        while (true) {
            $random = str_pad(rand(0, 99999), 5, 0);

            $prefijo = match ($tipo) {
                'carga' => 'CRG',
                'insumo' => 'INS',
                'reserva' => 'RES',
                'operacion' => 'OPR',
            };

            $codigo = "{$prefijo}-{$random}";

            if (self::unico($codigo, $tipo)) {
                return $codigo;
            }
        }
    }

    public static function unico($codigo, $tipo)
    {
        $clase = match ($tipo) {
            'carga' => Carga::class,
            'reserva' => Reserva::class,
            'operacion' => Operacion::class,
            'insumo' => Insumo::class,
        };

        return $clase::firstWhere('codigo', $codigo) === null;
    }
}

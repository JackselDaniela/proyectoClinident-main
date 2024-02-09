<?php

namespace App\Services;

use App\Models\Carga;
use App\Models\Insumo;

class Codigo
{
    public static function generar($tipo)
    {
        while (true) {
            $random = str_pad(rand(0, 99999), 5, 0);

            $prefijo = match ($tipo) {
                'carga' => 'CRG',
                'insumo' => 'INS',
            };

            $codigo = "{$prefijo}-{$random}";

            if (self::unico($codigo, $tipo)) {
                return $codigo;
            }
        }
    }

    public static function unico($codigo, $tipo)
    {
        if ($tipo === 'carga') {
            return Carga::firstWhere('codigo', $codigo) === null;
        }

        return Insumo::firstWhere('codigo', $codigo) === null;
    }
}

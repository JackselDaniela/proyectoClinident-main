<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function operaciones()
    {
        return $this->hasMany(Operacion::class);
    }

    public function getExistenciaAttribute() {
        return $this->operaciones->reduce(function ($suma, $op) {
            if ($op?->item?->reserva?->restitucion === null) {
                return $suma += $op->cantidad;
            }

            return $suma;
        }, 0);
    }

    public static function options(string $tipo)
    {
        $map = fn($insumo) => [
            'id' => $insumo->id,
            'title' => $insumo->nombre,
            'subtitle' => $insumo->codigo,
            'max' => $insumo->existencia,
        ];

        return self::where('tipo', $tipo)
            ->latest()
            ->get()
            ->map($map);
    }
}

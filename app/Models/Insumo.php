<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory, Filterable;

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
        $insumos = self::where('tipo', $tipo)
            ->latest()
            ->get();

        return self::mapToSelect($insumos);
    }

    public static function mapToSelect(Collection $insumos) {
        $map = fn($insumo) => [
            'id' => $insumo->id,
            'title' => $insumo->nombre,
            'subtitle' => $insumo->codigo,
            'max' => $insumo->existencia,
        ];

        return $insumos->map($map);
    }
}

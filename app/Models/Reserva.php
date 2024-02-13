<?php

namespace App\Models;

use App\Traits\Mutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory, Mutable;

    protected $guarded = [];

    protected $casts = [
        'restitucion' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function paciente_diagnostico()
    {
        return $this->belongsTo(paciente_diagnostico::class);
    }

    public function getCantidadAttribute()
    {
        $cantidad = $this->items->reduce(function ($sum, $item) {
            return $sum + $item->operacion->cantidad;
        }, 0);

        return abs($cantidad);
    }
}

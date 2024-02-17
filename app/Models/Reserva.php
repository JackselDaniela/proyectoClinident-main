<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

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

    public function getTratamientoAttribute()
    {
        return $this->paciente_diagnostico->titulo;
    }

    public function getEstatusAttribute()
    {
        return $this->restitucion !== null 
            ? 'Los equipos de esta reserva fueron restituidos al inventario.'
            : 'Los equipos de esta reserva aún no han sido restituidos al inventario.';
    }

    public function getCantidadAttribute()
    {
        $cantidad = $this->items->reduce(function ($sum, $item) {
            return $sum + $item->operacion->cantidad;
        }, 0);

        return abs($cantidad);
    }

    public function getMutableAttribute()
    {
        return now()->diffInMinutes($this->created_at) < 20 && $this->restitucion === null;
    }
}

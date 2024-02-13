<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function insumo()
    {
        return $this->belongsTo(Insumo::class);
    }

    public function carga()
    {
        return $this->hasOne(Carga::class);
    }

    public function consumo()
    {
        return $this->hasOne(Consumo::class);
    }

    public function item()
    {
        return $this->hasOne(Item::class);
    }

    public function getMovimientoAttribute()
    {
        $signo = $this->cantidad > 0 ? '+' : '';
        return "{$signo}{$this->cantidad}";
    }

    public function getMotivoAttribute()
    {
        return match (true) {
            $this->consumo !== null => 'Gasto de insumos.',
            $this->carga !== null => 'Carga de insumos.',
            $this->cantidad < 0 => 'Reserva de equipos médicos.',
            $this->cantidad > 0 => 'Restitución de equipos médicos.',
        };
    }
}

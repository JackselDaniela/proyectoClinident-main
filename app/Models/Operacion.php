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

    public function getRestituidoAttribute()
    {
        return $this->tipo === 'reserva' 
            && $this->item->reserva->restitucion !== null;
    }

    public function getTipoAttribute()
    {
        return match (true) {
            $this->consumo !== null => 'consumo',
            $this->carga !== null => 'carga',
            $this->item !== null => 'reserva',
        };
    }

    public function getMovimientoAttribute()
    {
        $signo = $this->cantidad > 0 ? '+' : '';

        return "{$signo}{$this->cantidad}";
    }

    public function getMotivoAttribute()
    {
        return match ($this->tipo) {
            'consumo' => 'Gasto de insumos.',
            'carga' => 'Carga de insumos.',
            'reserva' => $this->replicado
                ? 'Restitución de equipos médicos.'
                : 'Reserva de equipos médicos.'
        };
    }
}

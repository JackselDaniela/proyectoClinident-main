<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function operacion()
    {
        return $this->belongsTo(Operacion::class);
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}

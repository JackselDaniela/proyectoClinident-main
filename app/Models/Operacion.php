<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function suministro()
    {
        return $this->belongsTo(Suministro::class);
    }

    public function carga()
    {
        return $this->hasOne(Carga::class);
    }

    public function consumo()
    {
        return $this->hasOne(Consumo::class);
    }

    public function uso()
    {
        return $this->hasOne(Uso::class);
    }
}

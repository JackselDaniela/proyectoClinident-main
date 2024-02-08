<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suministro extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function operaciones()
    {
        return $this->hasMany(Operacion::class);
    }

    public function getExistenciaAttribute() {
        return $this->operaciones->reduce(
            fn($suma, $operacion) => $suma += $operacion->cantidad
        );
    }
}

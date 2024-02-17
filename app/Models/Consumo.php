<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function operacion()
    {
        return $this->belongsTo(Operacion::class);
    }

    public function paciente_diagnostico()
    {
        return $this->belongsTo(paciente_diagnostico::class);
    }
}

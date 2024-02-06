<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pieza extends Model
{
    use HasFactory;
    public function paciente_diagnostico(){
        return $this->hasMany(paciente_diagnostico::class,'piezas_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estatus_tratamiento extends Model
{
    use HasFactory;
    protected $guarded= [];
    public function paciente_diagnostico(){
        return $this->hasOne(paciente_diagnostico::class,'estatus_tratamientos_id');
    }
}

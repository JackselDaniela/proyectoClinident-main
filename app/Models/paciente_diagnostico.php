<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente_diagnostico extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function pieza(){
        return $this->belongsTo(pieza::class,'piezas_id');
    }
    public function diagnostico(){
        return $this->belongsTo(diagnostico::class,'diagnosticos_id');
    }
    public function registrar_tratamiento(){
        return $this->belongsTo(registrar_tratamiento::class,'registrar_tratamientos_id');
    }
    public function paciente(){
        return $this->belongsTo(paciente::class,'pacientes_id');
    }
    
    public function estatus_tratamiento(){
        return $this->belongsTo(estatus_tratamiento::class,'estatus_tratamientos_id');
    }
}

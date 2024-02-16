<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function doctor(){
        return $this->belongsTo(doctor::class,'doctors_id');
    }
    public function paciente(){
        return $this->belongsTo(paciente::class,'pacientes_id');
    }
    public function tipo_consulta(){
        return $this->belongsTo(tipo_consulta::class,'tipo_consultas_id');
    }
}

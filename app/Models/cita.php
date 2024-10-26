<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cita extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = []; 
    protected $fillable = ['pacientes_id','doctors_id','tipo_consultas_id','inicio','fin', 'fecha','confirmacion','descripcion','token']; 
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

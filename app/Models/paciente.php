<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class paciente extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function persona(){
        return $this->belongsTo(persona::class,'personas_id');
    }
    public function expediente(){
        return $this->hasOne(expediente::class,'pacientes_id');
    }
    public function paciente_diagnostico(){
        return $this->hasOne(paciente_diagnostico::class,'pacientes_id');
    }
    
    public function cita(){
        return $this->hasMany(cita::class,'pacientes_id');
    }

}

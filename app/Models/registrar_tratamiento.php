<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class registrar_tratamiento extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $guarded = []; 
   
    public function paciente_diagnostico(){
        return $this->hasMany(paciente_diagnostico::class,'registrar_tratamientos_id');
    } 
    public function especialidad(){
        return $this->belongsTo(especialidad::class,'especialidads_id');
    }
 
}

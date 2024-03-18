<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctor extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function persona(){
        return $this->belongsTo(persona::class,'personas_id');
    }
    public function especialidad(){
        return $this->belongsTo(especialidad::class,'especialidads_id');
    }
    public function cita(){
        return $this->hasMany(cita::class,'doctors_id');
    }
}

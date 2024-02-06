<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especialidad extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function doctor(){
        return $this->hasMany(doctor::class,'especialidads_id');
    }
    public function registrar_tratamiento(){
        return $this->hasMany(registrar_tratamiento::class,'especialidads_id');
    }
}

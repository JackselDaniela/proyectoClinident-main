<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estatus extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function registrar_tratamiento(){
        return $this->hasOne(estatus::class,'estatuses_id');
    }
}

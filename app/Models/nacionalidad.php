<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nacionalidad extends Model
{
    use HasFactory;
    
    protected $guarded= [];
    public function persona(){ 
        return $this->hasMany(persona::class,'nacionalidads_id');
    }
}
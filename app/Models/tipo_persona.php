<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_persona extends Model
{
    use HasFactory;
    
    public function persona(){
        return $this->hasMany(persona::class);
    }
}

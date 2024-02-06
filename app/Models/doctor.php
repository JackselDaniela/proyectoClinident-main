<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function persona(){
        return $this->belongsTo(persona::class,'personas_id');
    }
    public function especialidad(){
        return $this->belongsTo(especialidad::class,'especialidads_id');
    }
}

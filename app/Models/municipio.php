<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    use HasFactory;
    protected $guarded = []; 
    protected $primaryKey = 'id_municipio';
    public function estado(){
        return $this->belongsTo(estado::class,'id_estado');
    }
    public function parroquia(){
        return $this->hasMany(parroquia::class,'id_municipio');
    }
}

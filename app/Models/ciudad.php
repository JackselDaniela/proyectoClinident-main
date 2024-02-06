<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ciudad extends Model
{
    use HasFactory;
    protected $guarded = []; 
    protected $primaryKey = 'id_ciudad';
    public function estado(){
        return $this->belongsTo(estado::class,'id_estado');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    use HasFactory;
    protected $guarded = []; 
    protected $primaryKey = 'id_estado';
    public function municipio(){
        return $this->hasMany(municipio::class,'id_estado');
    }
    public function ciudad(){
        return $this->hasMany(ciudad::class,'id_estado');
    }
}

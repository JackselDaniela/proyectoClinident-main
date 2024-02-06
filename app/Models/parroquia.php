<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parroquia extends Model
{
    use HasFactory;
    protected $guarded = []; 
    protected $primaryKey = 'id_parroquia';
    public function municipio(){
        return $this->belongsTo(municipio::class,'id_municipio');
    }
}

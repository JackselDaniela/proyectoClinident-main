<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dato_ubicacion extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['estados_id','municipios_id','ciudades_id','parroquias_id','direccion','telefono'];
    public function persona(){
        return $this->hasOne(persona::class,'dato_ubicacions_id');
    }
    public $timestamps = false;
}

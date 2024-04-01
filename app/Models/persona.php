<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class persona extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $fillable = ['nombre', 'apellido', 'fecha_nacimiento', 'genero', 'foto','dato_ubicacions_id','nacionalidads_id','personas_id','user_id','doc_identidad', 'tipo_personas_id'];

    public function dato_ubicacion()
    {
        return $this->belongsTo(dato_ubicacion::class, 'dato_ubicacions_id');
    }
    public function nacionalidad()
    {
        return $this->belongsTo(nacionalidad::class, 'nacionalidads_id');
    }

    public function doctor()
    {
        return $this->hasOne(doctor::class, 'personas_id');
    }

    public function paciente()
    {
        return $this->hasOne(paciente::class, 'personas_id');
    }
    public function tipo_persona()
    {
        return $this->belongsTo(tipo_persona::class, 'tipo_personas_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

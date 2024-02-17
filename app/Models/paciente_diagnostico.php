<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente_diagnostico extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function pieza(){
        return $this->belongsTo(pieza::class,'piezas_id');
    }
    public function diagnostico(){
        return $this->belongsTo(diagnostico::class,'diagnosticos_id');
    }
    public function registrar_tratamiento(){
        return $this->belongsTo(registrar_tratamiento::class,'registrar_tratamientos_id');
    }
    public function paciente(){
        return $this->belongsTo(paciente::class,'pacientes_id');
    }
    
    public function estatus_tratamiento(){
        return $this->belongsTo(estatus_tratamiento::class,'estatus_tratamientos_id');
    }

    public function consumos()
    {
        return $this->hasMany(Consumo::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public static function options(estatus_tratamiento $estatus)
    {
        $with = ['paciente.persona', 'registrar_tratamiento'];

        $map = fn ($diagnostico) => [
            'id' => $diagnostico->id,
            'title' => $diagnostico->paciente->persona->nombre,
            'subtitle' => $diagnostico->registrar_tratamiento->nom_tratamiento,
        ];

        return self::with($with)
            ->where('estatus_tratamientos_id', $estatus->id)
            ->latest()
            ->get()
            ->map($map);
    }
}

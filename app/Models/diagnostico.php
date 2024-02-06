<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnostico extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function paciente_diagnostico(){
        return $this->hasOne(paciente_diagnostico::class,'diagnosticos_id');
    }
}

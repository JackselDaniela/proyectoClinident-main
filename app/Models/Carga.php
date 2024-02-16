<?php

namespace App\Models;

use App\Traits\Mutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    use HasFactory, Mutable;

    protected $guarded = [];

    protected $casts = [
        'elaboracion' => 'datetime',
        'vencimiento' => 'datetime',
    ];

    public function operacion()
    {
        return $this->belongsTo(Operacion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

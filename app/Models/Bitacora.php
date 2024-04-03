<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $table = 'bitacora';
    protected $fillable = ['user_id', 'action', 'file'];


    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

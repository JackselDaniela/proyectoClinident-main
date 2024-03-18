<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// $role= Role::create([
//     'name' => 'Administrador',
    
// ]);
// $role= Role::create([
//     'name' => 'Secretaria',
// ]);
// $role= Role::create([
//     'name' => ' Doctor',

// ]);
// $role= Role::create([
//     'name' => ' Paciente',

// ]);
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function cargas()
    {
        return $this->hasMany(Carga::class);
    }
    public function persona()
    {
        return $this->hasOne(persona::class);
    }
}

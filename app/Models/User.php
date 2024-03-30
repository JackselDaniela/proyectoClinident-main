<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
<<<<<<< HEAD
//use Spatie\Permission\Traits\HasRoles;
//use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;
=======
use Spatie\Permission\Traits\HasRoles;
>>>>>>> 78aed06773fdca6e3a539eda20d1226bfee7482b

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; //HasRoles quite

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

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements CanResetPassword
{
    use SoftDeletes;
    use CanResetPasswordTrait;
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role_id', 'avatar_path'];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function administrador()
    {
        return $this->hasOne(Administrador::class);
    }

    public function organizador()
    {
        return $this->hasOne(Organizador::class);
    }

    public function visitante()
    {
        return $this->hasOne(Visitante::class);
    }
}

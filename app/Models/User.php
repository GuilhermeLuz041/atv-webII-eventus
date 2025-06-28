<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'password', 'role_id'];

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

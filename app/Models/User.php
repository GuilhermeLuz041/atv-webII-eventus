<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'email', 'senha'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function administrador(){
        return $this->hasOne(Administrador::class);
    }

    public function organizador(){
        return $this->hasOne(Organizador::class);
    }

    public function visitante(){
        return $this->hasOne(Visitante::class);
    }

}

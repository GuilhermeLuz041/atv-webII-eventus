<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organizador extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'user_id'];

    protected $table = 'organizadores';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}

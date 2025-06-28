<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusEvento extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome'];

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}

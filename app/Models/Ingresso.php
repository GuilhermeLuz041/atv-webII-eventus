<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingresso extends Model
{
    use SoftDeletes;

    protected $fillable = ['preco', 'quantidade_total', 'quantidade_disponivel', 'evento_id'];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

}

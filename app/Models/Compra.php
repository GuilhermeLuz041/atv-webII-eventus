<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use SoftDeletes;

    protected $fillable = ['data_compra', 'visitante_id', 'ingresso_id'];

    public function visitante()
    {
        return $this->belongsTo(Visitante::class);
    }

    public function ingresso()
    {
        return $this->belongsTo(Ingresso::class);
    }

}

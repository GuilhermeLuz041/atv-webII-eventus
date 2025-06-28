<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'descricao', 'senha', 'data_evento', 'local', 'status_evento_id', 'categoria_id', 'organizador_id'];

    public function ingressos()
    {
        return $this->hasMany(Ingresso::class);
    }

    public function status()
    {
        return $this->belongsTo(StatusEvento::class, 'status_evento_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function organizador()
    {
        return $this->belongsTo(Organizador::class);
    }
}

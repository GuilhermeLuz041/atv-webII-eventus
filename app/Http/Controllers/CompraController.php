<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Compra;
use App\Models\Evento;
use Illuminate\Http\Request;

class CompraController extends Controller
{

    public function store(Evento $evento)
    {
        $ingresso = $evento->ingressos()->where('quantidade_disponivel', '>', 0)->first();
        
        $ingresso->quantidade_disponivel -= 1;
        $ingresso->save();

        Compra::create([
            'visitante_id' => Auth::user()->visitante->id,
            'ingresso_id' => $ingresso->id,
            'quantidade' => 1,
            'data_compra' => now(),
        ]);

        return back()->with('success', 'Compra realizada com sucesso!');
    }

    public function cancelar(Compra $compra)
    {
        $user = Auth::user();

        $visitante = $user->visitante;

        $compra->load('ingresso');

        if (!$compra->ingresso) {
            return redirect()->back()->with('error', 'Ingresso não encontrado para esta compra.');
        }

        $compra->ingresso->increment('quantidade_disponivel');

        $compra->delete();

        return redirect()->back()->with('success', 'Compra cancelada com sucesso.');
    }

}

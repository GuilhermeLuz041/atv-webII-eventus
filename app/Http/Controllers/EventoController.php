<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Evento;
use App\Models\Categoria;
use App\Models\StatusEvento;
use App\Models\Ingresso;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index()
    {
        $eventos = Evento::paginate(10);
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $status = StatusEvento::all();

        return view('organizer.create', compact('categorias', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_evento' => 'required|date',
            'local' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'preco_ingresso' => 'required|numeric|min:0',
            'quantidade_total' => 'required|integer|min:1',
        ]);

        $organizador_id = Auth::user()->organizador->id;

        $evento = Evento::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_evento' => $request->data_evento,
            'local' => $request->local,
            'status_evento_id' => 3,
            'categoria_id' => $request->categoria_id,
            'organizador_id' => $organizador_id,
        ]);

        $evento->ingressos()->create([  
            'preco' => $request->preco_ingresso,
            'quantidade_total' => $request->quantidade_total,
            'quantidade_disponivel' => $request->quantidade_total,
        ]);

        return redirect()->route('organizer.dashboard')->with('success', 'Evento criado e está pendente de aprovação pelo administrador.');
    }


    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    public function edit(Evento $evento)
    {
        $evento->load('ingressos');

        $categorias = Categoria::all();
        $status = StatusEvento::all();

        return view('organizer.edit', compact('evento', 'categorias', 'status'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_evento' => 'required|date',
            'local' => 'required|string|max:255',
            'status_evento_id' => 'required|exists:status_eventos,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $evento->update($request->all());

        return redirect()->route('organizer.dashboard')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->back()->with('success', 'Evento deletado com sucesso.');
    }
}

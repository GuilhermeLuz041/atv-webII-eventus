<?php

namespace App\Http\Controllers;

use App\Models\Evento;
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
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_evento' => 'required|date',
            'local' => 'required|string|max:255',
            'status_evento_id' => 'required|exists:status_eventos,id',
            'categoria_id' => 'required|exists:categorias,id',
            'organizador_id' => 'required|exists:organizadores,id',
        ]);

        Evento::create($request->all());

        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso!');
    }

    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
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
            'organizador_id' => 'required|exists:organizadores,id',
        ]);

        $evento->update($request->all());

        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento removido com sucesso!');
    }
}

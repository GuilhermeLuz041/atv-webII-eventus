<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Categoria;
use App\Models\StatusEvento;

class AdminController extends Controller
{
   public function index(Request $request)
    {
        $query = Evento::query();

        if ($request->filtro === 'pendentes') {
            $query->where('status_evento_id', 3); 
        }

        $eventos = $query->with('organizador.user')->paginate(15);

        return view('admin.eventos.index', compact('eventos'));
    }

    public function show($id)
    {
        $evento = Evento::with('organizador.user')->findOrFail($id);
        return view('admin.eventos.show', compact('evento'));
    }

    public function aprovar($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->status_evento_id = 1; 
        $evento->save();

        return redirect()->back()->with('success', 'Evento aprovado com sucesso!');
    }

    public function rejeitar($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->status_evento_id = 4;  
        $evento->save();

        return redirect()->back()->with('success', 'Evento rejeitado.');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        $categorias = Categoria::all();      
        $status = StatusEvento::all();

        return view('admin.eventos.edit', compact('evento', 'categorias', 'status'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_evento' => 'required|date',
            'local' => 'required|string|max:255',
        ]);

        $evento->update($request->only(['nome', 'descricao', 'data_evento', 'local']));

        return redirect()->route('admin.eventos.index', $evento->id)->with('success', 'Evento atualizado com sucesso!');
    }
}

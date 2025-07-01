<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with(['visitante', 'ingresso'])->paginate(10);
        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        return view('compras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_compra' => 'required|date',
            'visitante_id' => 'required|exists:visitantes,id',
            'ingresso_id' => 'required|exists:ingressos,id',
        ]);

        Compra::create($request->all());

        return redirect()->route('compras.index')->with('success', 'Compra registrada com sucesso!');
    }

}

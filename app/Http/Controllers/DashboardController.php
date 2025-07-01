<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Evento;

class DashboardController extends Controller
{
    public function visitor()
    {
        $user = Auth::user();

        $compras = $user->visitante->compras()->with('ingresso.evento')->get();
        $eventosComprados = $compras->map(fn($compra) => $compra->ingresso->evento);

        $todosEventos = Evento::all();

        $eventos = $todosEventos->diff($eventosComprados);

        return view('visitor.dashboard', compact('user', 'eventos'));
    }

    public function organizer()
    {
        $user = Auth::user();

        $organizador_id = $user->organizador->id;

        $eventos = Evento::where('organizador_id', $organizador_id)->get();

        return view('organizer.dashboard', compact('user', 'eventos'));
    }

    public function admin()
    {
        $user = Auth::user();

        return view('admin.dashboard', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Evento;
use App\Models\User;

class DashboardController extends Controller
{
    public function visitor()
    {
        $user = Auth::user();
      
        $statusPermitidos = [1]; 

        $eventosDisponiveis = Evento::whereIn('status_evento_id', $statusPermitidos)
            ->with(['ingressos'])
            ->get();

        $compras = $user->visitante->compras()->with('ingresso.evento')->get();
        $eventosComprados = $compras->map(fn($compra) => $compra->ingresso->evento);

        $eventos = $eventosDisponiveis->diff($eventosComprados);

        return view('visitor.dashboard', compact('user', 'eventos'));
    }

    public function organizer()
    {
        $user = Auth::user();

        $organizador_id = $user->organizador->id;

        $eventos = Evento::where('organizador_id', $organizador_id)->with(['ingressos', 'status']) ->get();

        return view('organizer.dashboard', compact('user', 'eventos'));
    }

    public function admin()
    {
        $user = Auth::user();

        $totalUsuarios = User::count();
        $totalEventos = Evento::count();
        $eventosPendentes = Evento::where('status_evento_id', 3)->count(); 

        return view('admin.dashboard', compact('totalUsuarios', 'totalEventos', 'eventosPendentes'));
    }
}

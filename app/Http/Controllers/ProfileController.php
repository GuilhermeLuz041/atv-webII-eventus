<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evento;

class ProfileController extends Controller
{
    public function visitorProfile()
    {
        $user = Auth::user();

        $compras = $user->visitante->compras()->with('ingresso.evento')->get();

        $eventos = $compras->map(fn($compra) => $compra->ingresso->evento);

        return view('visitor.profile', compact('user', 'eventos'));
    }

    public function organizerProfile()
    {
        $user = Auth::user();

        $organizador_id = $user->organizador->id;

        $eventos = Evento::where('organizador_id', $organizador_id)->get();

        return view('organizer.profile', compact('user', 'eventos'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
    }
}

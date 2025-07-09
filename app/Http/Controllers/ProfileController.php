<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evento;
use App\Models\Compra;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function visitorProfile()
    {
        $user = Auth::user();
        $visitante = $user->visitante; 

        $compras = Compra::with('ingresso.evento')
            ->where('visitante_id', $visitante->id)
            ->get();

        return view('visitor.profile', compact('user', 'compras'));
    }

    public function organizerProfile()
    {
        $user = Auth::user();

        $organizador_id = $user->organizador->id;

        $eventos = Evento::where('organizador_id', $organizador_id)->get();

        return view('organizer.profile', compact('user', 'eventos'));
    }

    public function update(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $user = Auth::user();

        $user->name = $request->name;

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar_path = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso.');
    }


    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    
    public function create(): View
    {
        $roles = Role::where('nome', '!=', 'administrador')->get();
        return view('auth.register', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role_id,
        ]);

        $now = now();
        $data = ['user_id' => $user->id, 'created_at' => $now, 'updated_at' => $now];

        match ($user->role->nome) {
            'visitante'     => DB::table('visitantes')->insert($data),
            'organizador'   => DB::table('organizadores')->insert($data),
            default         => null,
        };

        event(new Registered($user));
        Auth::login($user);

        return match ($user->role->nome) {
            'administrador' => redirect()->route('admin.dashboard'),
            'organizador'   => redirect()->route('organizer.dashboard'),
            default         => redirect()->route('visitor.dashboard'),
        };
    }
}

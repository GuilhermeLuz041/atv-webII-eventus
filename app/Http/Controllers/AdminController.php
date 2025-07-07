<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Role;
use App\Models\StatusEvento;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function index(Request $request)
    {
        $eventos = Evento::with('organizador.user', 'status') 
        ->orderByRaw("status_evento_id = 3 DESC") 
        ->paginate(15);

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

        return redirect()->route('admin.eventos.index')->with('success', 'Evento aprovado com sucesso!');
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

    public function createAdmin()
    {
        return view('admin.usuarios.create');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $adminRole = Role::where('nome', 'administrador')->firstOrFail();

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $adminRole->id,
        ]);

        $now = now();
        DB::table('administradores')->insert([
            'user_id'    => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        event(new Registered($user));

        return redirect()->route('admin.usuarios.index')->with('success', 'Administrador criado com sucesso!');
    }


    public function listarUsuarios()
    {
        $users = User::with('role')->paginate(10);

        return view('admin.usuarios.index', compact('users'));
    }

    public function editarUsuario(User $user)
    {
        return view('admin.usuarios.edit', compact('user'));
    }

    public function atualizarUsuario(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }


    public function destroy(User $user)
    {
        if ($user->role->nome === 'administrador') {
            return redirect()->route('admin.usuarios.index')->with('error', 'Não é permitido deletar um administrador.');
        }

        $user->delete();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário deletado com sucesso!');
    }

}

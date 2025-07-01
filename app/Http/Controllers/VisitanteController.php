<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use Illuminate\Http\Request;

class VisitanteController extends Controller
{
    public function index()
    {
        $visitantes = Visitante::paginate(10);
        return view('visitantes.index', compact('visitantes'));
    }

    public function show(Visitante $visitante)
    {
        return view('visitantes.show', compact('visitante'));
    }

}

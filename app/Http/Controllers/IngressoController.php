<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;    
use Barryvdh\DomPDF\Facade\Pdf;


class IngressoController extends Controller
{
    public function gerarPDF($id)
    {
        $user = Auth::user();
        $evento = Evento::with('ingressos')->findOrFail($id);

        $pdf = Pdf::loadView('pdf.ingresso', compact('user', 'evento'));
        
        return $pdf->download("ingresso-{$evento->id}.pdf");
    }

}

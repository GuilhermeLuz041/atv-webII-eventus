<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        if (!Auth::check()) {
            abort(403);
        }

        $allowedRoles = explode(',', $roles);
        $userRole = Auth::user()->role?->nome;

        if (!in_array($userRole, $allowedRoles)) {
            abort(403);
        }

        return $next($request);
    }
}

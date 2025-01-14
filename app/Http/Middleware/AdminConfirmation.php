<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminConfirmation
{
    public function handle(Request $request, Closure $next)
    {
        // Controleer of de gebruiker admin is
        if (auth()->user() && auth()->user()->is_admin) {
            return $next($request);
        }
        // Redirect naar de nieuwsindexpagina als de gebruiker geen toegang heeft
        return redirect()->route('news.index')->with('error', 'Je hebt geen toegang tot deze pagina.');
    }

}

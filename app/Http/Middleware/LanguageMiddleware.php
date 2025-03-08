<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has("locale")) {
            App::setLocale(session()->get("locale"));
        } else {
            App::setLocale(config('app.locale', 'es')); // Idioma por defecto
            session()->put('locale', config('app.locale', 'es'));
        }
        return $next($request);
    }
}

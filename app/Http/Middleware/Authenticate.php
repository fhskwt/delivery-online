<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Если пользователь не авторизован
        if (! Auth::check()) {
            // Если запрос ожидает JSON (например AJAX)
            if ($request->expectsJson()) {
                abort(401); // вернёт 401
            }

            // Иначе редирект на нашу страницу авторизации
            return redirect()->route('auth');
        }

        // Всё ок, пускаем дальше
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaticApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Swagger UI исключаем
        if (str_contains($request->path(), 'api/documentation')) {
            return $next($request);
        }

        $apiKey = $request->header('X-API-KEY');

        if ($apiKey !== config('app.static_api_key')) {
       

            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // Gunakan namespace yang benar
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkRoll
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user(); // Mengambil pengguna yang sedang login
        
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }
        
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}

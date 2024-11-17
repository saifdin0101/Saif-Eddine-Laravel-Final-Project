<?php

namespace App\Http\Middleware;

use App\Models\Trainer;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        
        if ($user && $user->approve && Trainer::where('user_id', $user->id)->where('payment', true)->exists()) {
            return $next($request);
        }
    
        return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
    }
    
}

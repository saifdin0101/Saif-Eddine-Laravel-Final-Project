<?php

namespace App\Http\Middleware;

use App\Models\Body;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SeenBodyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        // Check if body information exists for the user
        if ($user && Body::where('user_id', $user->id)->exists()) {
           
            return redirect('/dashboard')->with('info', 'You have already completed your body information.');
        }

        return $next($request);
    }
}

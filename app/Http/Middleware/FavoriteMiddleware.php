<?php

namespace App\Http\Middleware;

use App\Models\Exercice;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavoriteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user  = User::where("id", auth()->user()->id)->first();
        $exoID = $request->exercice_id;
        dd($exoID);
        if ($user->DoneExercice()->where('exercice_id', $exoID)->exists()) {
            return $next($request);
        }
        
    }
}

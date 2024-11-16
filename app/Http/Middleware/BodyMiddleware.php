<?php

namespace App\Http\Middleware;

use App\Models\Body;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BodyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user  = User::where("id", auth()->user()->id)->first();


        if ($user && Body::where('user_id', $user->id || $user->role == "admin")) {
            return $next($request);
        }
        return redirect()->route('body.index')->with("error", 'You Need To Finish Your Information First :)');
    }
}


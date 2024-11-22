<?php

namespace App\Http\Middleware;

use App\Models\Join;
use App\Models\Sesin;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $session =$request->route('session') ;
        
       
        if ( $user && Join::where('user_id',$user->id)->where('sesin_id',$session->id)->exists() || Sesin::where('user_id',$user->id)->exists() ) {
            
            return $next($request);
        }

        return redirect()->route('session.index')->with('error','Join The Session  First');
        
    }
}

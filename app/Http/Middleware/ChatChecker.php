<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ChatChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user())
        {
            return redirect()->route('LoginUi');
        }
        else
        {
            if(Auth::user()->dokumentasi == 0)
            {
                if(Auth::user()->admin == 1)
                {
                    return $next($request);
                }
                else
                {
                    return redirect()->route('HomeUi');
                }
            }
            else
            {
                return $next($request);
            }
            
        }
        
    }
}

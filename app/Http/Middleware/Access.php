<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role==='chef_idc'){
            return redirect()->route('demandes.index');
        }
        else if(Auth::user()->role==='agent'){
            return redirect()->route('autorisation.index');
        }
        else if(Auth::user()->role==='chef_complex'){
            return redirect()->route('demandes.create');
        }
        else abort(403);
        
        return $next($request);
    }
}

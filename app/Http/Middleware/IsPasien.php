<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPasien
{
  
  public function handle(Request $request, Closure $next)
  {
    if (auth()->user()->role !== 'pasien') {
      abort(404);
    }
    
    return $next($request);
  }
}

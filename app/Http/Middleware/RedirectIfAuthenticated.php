<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class RedirectIfAuthenticated{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @param  string|null  $guard
   * @return mixed
   */
  public function handle($request, Closure $next, $guard = null){
    if(current_user()){
      if(current_user()->isAdmin()){
        return redirect()->route('admin.dashboard');
      } 

      return redirect()->route('dashboard');
    }

    return $next($request);
  }
}

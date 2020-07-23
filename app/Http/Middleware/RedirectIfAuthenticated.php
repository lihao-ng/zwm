<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::check()){
      if(current_user()->role_id == 1){
        return redirect()->route('admin.dashboard');
      } 

      // replaced this once i have the proper route for merchant
      return redirect()->url('/');

      // return redirect()->route('dashboard');
    }

    return $next($request);
  }
}

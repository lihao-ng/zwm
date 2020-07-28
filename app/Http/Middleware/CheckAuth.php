<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next, $type){
    if(current_user()){
      if(current_user()->isAdmin() && $type == 'admin') {
        return $next($request);
      }else if(current_user()->isMerchant() && $type == 'merchant') {
        return $next($request);
      }
      
      if(current_user()->isAdmin() && $type == 'merchant'){
        return redirect()->route('admin.dashboard');
      }      
      
      return redirect()->route('dashboard');
    }

    if($type == 'admin'){
      return redirect()->route('admin.login.show');
    }      
    
    return redirect()->route('login.show');
  }
}

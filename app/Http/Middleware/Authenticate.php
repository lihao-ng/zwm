<?php

namespace App\Http\Middleware;

use Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  protected function redirectTo($request){
    if(!$request->expectsJson()) {
      if(Route::is('admin.*')){
        return route('admin.login.show');
      }
      
      // replaced this once i have the proper route for merchant
      return redirect()->url('/');
      
      // return route('login.show');
    }
  }
}

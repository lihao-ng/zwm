<?php

namespace App\Http\Middleware;

use Closure;
use Validator;
use App\OauthClient;

class PassportClientAuth{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next){
    $validator = Validator::make($request->headers->all(), [
      'client-id' => 'required',
      'client-secret' => 'required',
      ]);

    if ($validator->fails()) {
      return validation_error('client_id or client_secret is missing');
    }
    
    $clientId = $request->header('client-id');
    $clientSecret = $request->header('client-secret');
    
    $oauthClient = OauthClient::where('id', $clientId)->where('secret', $clientSecret)->first();

    if ($oauthClient == null) {
			return validation_error('client_id or client_secret is wrong');
    }
    
		return $next($request);
  }
}

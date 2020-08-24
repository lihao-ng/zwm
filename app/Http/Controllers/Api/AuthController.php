<?php

namespace App\Http\Controllers\Api;

use App\User;

use App\Services\Api\AuthServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller{
	
	protected $authServices;

	function __construct(AuthServices $authServices){
		$this->authServices = $authServices;
	}

	public function register(Request $request) {
		return $this->authServices->register($request);
	}

	public function login(Request $request) {	
    return $this->authServices->login($request);
  }
	
	public function logout() {
		return $this->authServices->revokeToken();
	}

	public function accessToken(){
		return $this->authServices->accessToken();
	}
}

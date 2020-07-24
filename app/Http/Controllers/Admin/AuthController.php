<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AuthController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'admin.auth.';


	/**
	 * Display the login form
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showLogin(){
		return view(self::PATH . 'login');
	}


	/**
	 * Login admin using the given credentials
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function login(Request $request){
		$this->validate($request, [
	    "email" => "required|email",
	    "password" => "required"
    ]);
    
	  if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => 1])) {
			return redirect()->route('admin.dashboard');
	  }
		else{
	    return redirect()->back()->withErrors(['message' => 'Email or password is incorrect.']);
	  }
	}


	/**
	 * Logout currently auth admin
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function logout(){
	  Auth::logout();

	  return redirect()->route('admin.login.show');
	}
}

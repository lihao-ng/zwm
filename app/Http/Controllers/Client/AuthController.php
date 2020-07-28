<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Merchant;

use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Session;


class AuthController extends Controller {
  protected $path = 'client.auth.';

	public function showRegister(){
		return view($this->path . 'register');
	}

	public function showLogin(){
		return view($this->path . 'login');
  }
  
	public function login(Request $request){
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);
    
    $user = User::where('email', $request->email)->where('role_id', 2)->first();
    
    if($user) {
      $approved = $user->merchant->approved;
    }

    if(empty($approved)) {
	    return redirect()->back()->withErrors(['message' => 'Email or password is incorrect.']);
    }

    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			return redirect()->route('dashboard');
	  }
		else{
	    return redirect()->back()->withErrors(['message' => 'Email or password is incorrect.']);
	  }
	}

	public function register(Request $request){
		$this->validate($request, [
			'category' => 'required',
			'name' => 'required',
			'description' => 'required',
			'address' => 'required',
			'hours' => 'required',
      'contact' => 'required',
      'link' => 'required',
      'feedback' => 'required',
      'photo' => 'required',
			'email' => 'required|email|unique:users|max:255'
		]);
    
    $user = new User();
    $user->role_id = 2;
    $user->email = $request->email;
    $user->password = Hash::make('secret');
    $user->save();

    $merchant = new Merchant();
    $merchant->user_id = $user->id;
    $merchant->name = $request->name;
    $merchant->category = $request->category;
    $merchant->description = $request->description;
    $merchant->contact = $request->contact;
    $merchant->address = $request->address;
    $merchant->lat = $request->lat;
    $merchant->lng = $request->lng;
    $merchant->business_hours = $request->hours;
    $merchant->link = $request->link;
    $merchant->other_information = $request->feedback;
    $merchant->approved = 0;

    // Upload file

    $merchant->save();

		Session::flash('success','Registration successful! Your account will be verified by the admin in 3 to 5 working days.');

		return redirect()->route('login.show');
	}

	public function logout() {
		Auth::logout();

		return redirect()->route('login.show');
	}

	// public function forgotPassword() {
	// 	return view($this->path . 'forgot-pw');
	// }

	// public function resetPassword($verificationToken) {
	// 	$verification = VerificationToken::where('code', $verificationToken)->first();
	// 	$expiry = $verification->expires_at;
	// 	$expirydate = Carbon::parse($expiry);
	// 	$current = Carbon::now();
	// 	if ($expirydate->gt($current) && $verification->validated_at == null){
	// 		return view($this->path . 'reset-pw', ['verification' => $verification]);
	// 	} 
	// 	else {
	// 		abort(401, 'Token has expired.');
	// 	}
	// }

	// public function reset(Request $request, $id){
	// 	$data = $request->validate([
	// 		'password' => 'required|min:6|confirmed'
	// 	]);

	// 	$verificationToken = VerificationToken::where('id', $id)->first();
	// 	$player = $verificationToken->player;

	// 	$player->password = Hash::make($data['password']);
	// 	$verificationToken->validated_at = Carbon::now();
	// 	$player->save();
	// 	$verificationToken->save();

	// 	return success('Password changed successfully'); 
		
	// }

	// public function passwordToken(Request $request) {
	// 	$this->validate($request, [
	// 		'email' => 'required|email'
	// 	]);

	// 	$email = Player::where('email', $request->email)->first();

	// 	if (!$email){
	// 		return validation_error('Email invalid');
	// 	}
		
	// 	$expiry = Carbon::now()->addDay();
	// 	$code = bin2hex(random_bytes(7));
		
	// 	$token = new VerificationToken();
	// 	$token->player_id = $email->id;
	// 	$token->code = $code;
	// 	$token->expires_at = $expiry;
	// 	$token->save();

	// 	return success('Email sent');
	// }
}
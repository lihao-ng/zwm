<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Merchant;

use App\Services\ImageLibraryService;

use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Session;


class AuthController extends Controller {
  protected $imageLibraryService;
  protected $path = 'client.auth.';

  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

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
      'lat' => 'required',
      'lng' => 'required',
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

    $photoName = $this->imageLibraryService->create($request->file('photo'), 'merchants');

    $merchant->photo = $photoName;
    $merchant->save();

		Session::flash('success','Registration successful! Your account will be verified by the admin in 3 to 5 working days.');

		return redirect()->route('login.show');
	}

	public function logout() {
		Auth::logout();

		return redirect()->route('login.show');
	}
}
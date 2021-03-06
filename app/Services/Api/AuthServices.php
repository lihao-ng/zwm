<?php

namespace App\Services\Api;

use App\User;
use App\Customer;
use App\OauthAccessToken;
use App\OauthRefreshToken;

use App\Services\ImageLibraryService;

use Carbon\Carbon;
use Closure;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthServices {
  protected $imageLibraryService;

  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

	public function register(Request $request) {
    $validator = Validator::make($request->all(), [
			"first_name" => "required",
			"last_name" => "required",
      "email" => "required|email|unique:users",
			"gender" => "required",
			"password" => "required|confirmed|min:6"
    ]);

    if ($validator->fails()) {
      return validation_error($validator->errors()->first()); 
    }
    
    $uniqueCode = $this->uniqueCode(7);

		$user = new User();
    $user->role_id = 3;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->gender = $request->gender;
    $user->password = Hash::make($request->password);
    $user->save();

    $merchant = new Customer();
    $merchant->user_id = $user->id;
    $merchant->total_points = 0;
    $merchant->current_points = 0;
    $merchant->code = $uniqueCode;
    $merchant->qr_code = $this->imageLibraryService->createQR($uniqueCode, 'qrs/users');
    $merchant->save();

		return $this->login($request);
  }
  
  public function uniqueCode($limit) {
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
  }

	public function login(Request $request) {
    $validator = Validator::make($request->all(), [
      "email" => "required|email",
      "password" => "required"
    ]);

    if ($validator->fails()) {
      return validation_error($validator->errors()->first()); 
    }
    
		if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => 3])) {
			return $this->createToken($request, Auth::user());
		}else{
			return validation_error('Email or password is incorrect');
		}
	}

	public function createToken(Request $request, $user) {
		$tokenExist = OauthAccessToken::where("user_id", $user->id)->where("revoked", 0)->first();

		if($tokenExist) {
			OauthAccessToken::where('user_id', $user->id)->where('revoked', 0)->update(['revoked' => 1]);
      $refreshToken = OauthRefreshToken::where('access_token_id', $tokenExist->id)->first();
      
      $refreshToken->revoked = 1;
      $refreshToken->save();
    }

		$response = $this->generateOauthRequest($request, $user);
		$responseBody = json_decode($response->getBody());

		return $this->transform($responseBody, $user);
	}

	public function revokeToken() {
		$accessToken = current_user()->token();
    
    $refreshToken = OauthRefreshToken::where('access_token_id', $accessToken->id)->where('revoked', 0)->first();
      
    $refreshToken->revoked = 1;
    $refreshToken->save();
    
    $accessToken->revoke();

		return success('You have successfully logged out.');
	}

	public function generateOauthRequest(Request $request, User $user){
		$http = new Client();

    $form_params = [
      'grant_type' => 'password',
      'client_id' => $request->header('client-id'),
      'client_secret' => $request->header('client-secret'),
      'username' => $user->email,
      'password' => $request->password,
    ];
    
		$response = $http->post(url('oauth/token'), [
			'verify' => false,
			'form_params' => $form_params,
    ]);
			
		return $response;
	}

	public function accessToken(){
		return success();
  }

  public function updateAccount(Request $request) {
    $validator = Validator::make($request->all(), [
      "first_name" => "required",
      "last_name" => "required",
			"password" => "required|confirmed|min:6"
    ]);

    if ($validator->fails()) {
      return validation_error($validator->errors()->first()); 
    }
    
    $user = current_user();
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->password = Hash::make($request->password);
    $user->save();

    return [
      'first_name' => $user->first_name,
      'last_name' => $user->last_name,
    ];
	}
  
  public function getPoints() {
    $customer = current_user()->customer;

    return [
      'total_points' => $customer->total_points,
      'current_points' => $customer->current_points
    ];
  }

	public function transform($response, $user) {
		return [
      'access_token' => $response->access_token,
      'expires_at' => Carbon::now()->addSeconds($response->expires_in)->format('Y-m-d h:i:s'),
			'user_id' => $user->id,
			'first_name' => $user->first_name,
      'last_name' => $user->last_name,
      'email' => $user->email,
      'total_points' => $user->customer->total_points,
      'current_points' => $user->customer->current_points,
      'code' => $user->customer->code,
      'qr_code' => $this->imageLibraryService->fullPath($user->customer->qr_code),
		];
	}
}

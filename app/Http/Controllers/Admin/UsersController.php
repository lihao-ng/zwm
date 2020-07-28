<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Services\Admin\UserServices;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'admin.user.';

	protected $userServices;

	public function __construct(UserServices $userServices){
		$this->userServices = $userServices;
	}

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->wantsJson()) {
      return $this->userServices->index($request);
    }

		return view(self::PATH . 'index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Customer $customer){
    $customer->delete();
    
		return success();
	}
}

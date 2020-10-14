<?php

namespace App\Http\Controllers\Admin;

use App\Merchant;
use App\Services\Admin\MerchantServices;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantsController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'admin.merchant.';

	protected $merchantServices;

	public function __construct(MerchantServices $merchantServices){
		$this->merchantServices = $merchantServices;
	}


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->wantsJson()) {
      return $this->merchantServices->index($request);
    }

		return view(self::PATH . 'index');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Merchant $merchant){
		return view(self::PATH . 'edit', ['merchant' => (object) $this->merchantServices->transform($merchant)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

   public function show(Merchant $merchant){
     # code...
   }

  public function update(Request $request, Merchant $merchant){
    return $this->merchantServices->update($request, $merchant);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Merchant $merchant){
    $merchant->delete();
    
		return success();
  }

  public function import(Request $request) {
    return $this->merchantServices->import($request);
  }
}

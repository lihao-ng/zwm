<?php

namespace App\Http\Controllers\Api;

use App\Merchant;

use App\Services\Api\MerchantServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantsController extends Controller{
	
	protected $merchantServices;

	function __construct(MerchantServices $merchantServices){
		$this->merchantServices = $merchantServices;
	}

	public function index(Request $request) {
		return $this->merchantServices->index($request);
  }
  
  public function show(Request $request, Merchant $merchant) {
		return $this->merchantServices->show($merchant);
	}
}

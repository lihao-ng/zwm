<?php

namespace App\Http\Controllers\Api;

use App\Merchant;

use App\Services\Api\MerchantServices;
use App\Services\Api\OfferServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantsController extends Controller{
	protected $merchantServices;
	protected $offerServices;

	function __construct(MerchantServices $merchantServices, OfferServices $offerServices){
    $this->merchantServices = $merchantServices;
    $this->offerServices = $offerServices;
	}

	public function index(Request $request) {
		return $this->merchantServices->index($request);
  }
  
  public function show(Request $request, Merchant $merchant) {
    $offers = $this->offerServices->transformCollection($merchant->offers);
    $merchant = $this->merchantServices->transform($merchant);
    
    $merchant['offers'] = $offers;

    return $merchant;
  }
  
  public function nearby(Request $request) {
		return $this->merchantServices->nearby($request);
  }
}

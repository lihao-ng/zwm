<?php

namespace App\Http\Controllers\Api;

use App\Offer;

use App\Services\Api\MerchantServices;
use App\Services\Api\OfferServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OffersController extends Controller{
	protected $merchantServices;
	protected $offerServices;

	function __construct(MerchantServices $merchantServices, OfferServices $offerServices){
    $this->merchantServices = $merchantServices;
    $this->offerServices = $offerServices;
	}

	public function index(Request $request) {
		return $this->offerServices->index($request);
  }
  
  public function show(Request $request, Offer $offer) {
    $merchant = $this->merchantServices->transform($offer->merchant);
    $offer = $this->offerServices->transform($offer);
    
    $merchant['merchant'] = $merchant;

    return $merchant;
  }
}

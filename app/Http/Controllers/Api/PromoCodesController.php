<?php

namespace App\Http\Controllers\Api;

use App\PromoCode;

use App\Services\Api\PromoCodeServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromoCodesController extends Controller {
  protected $promoCodeServices;

	function __construct(PromoCodeServices $promoCodeServices){
    $this->promoCodeServices = $promoCodeServices;
  }
  
	public function index(Request $request) {
		return $this->promoCodeServices->index($request);
  }
  
  public function redeem(Request $request) {
    return $this->promoCodeServices->redeem($request);
  }
}

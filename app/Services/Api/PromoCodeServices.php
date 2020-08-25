<?php

namespace App\Services\Api;

use App\Customer;
use App\Offer;
use App\PromoCode;

use App\Services\ImageLibraryService;
use App\Services\TransformerService;

use Illuminate\Http\Request;

class PromoCodeServices extends TransformerService {
  protected $imageLibraryService;

  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

  public function redeem(Request $request) {
    $request->validate([
      "offer_id" => "required",
    ]);

    $customer = current_user()->customer;
    $offer = Offer::find($request->offer_id);
   
    if($customer->current_points < $offer->points) {
			return validation_error('Insufficient Points');
    }

    $customer->current_points -= $offer->points;
    $customer->save();

    $validPromoCode = PromoCode::where('offer_id', $offer->id)->where('customer_id', null)->first();
    $validPromoCode->customer_id = $customer->id;
    $validPromoCode->save();

    return $this->transform($validPromoCode);
  }

  public function transform($promoCode) {
    return [
			'id' => $promoCode->id,
			'name' => $promoCode->offer->name,
      'code' => $promoCode->code,
      'qr_code' => $this->imageLibraryService->fullPath($promoCode->qr_code)
		];
  }
}

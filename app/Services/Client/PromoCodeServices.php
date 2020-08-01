<?php

namespace App\Services\Client;

use App\PromoCode;
use App\Offer;

use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\ImageLibraryService;

class PromoCodeServices extends TransformerService{
  protected $imageLibraryService;

  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }
  
	public function index($request){
		$sort = $request->sort ? $request->sort : 'created_at';
		$order = $request->order ? $request->order : 'desc';
		$limit = $request->limit ? $request->limit : 10;
		$offset = $request->offset ? $request->offset : 0;
		$query = $request->search ? $request->search : '';

    $promoCodes = PromoCode::whereHas('offer', function($q) use ($query){
      $q->where('merchant_id', current_user()->merchant->id);
    })->where('code', 'like', "%{$query}%");    
		$listCount = $promoCodes->count();

		$promoCodes = $promoCodes->limit($limit)->offset($offset)->get();

		return respond(['rows' => $this->transformCollection($promoCodes), 'total' => $listCount]);
  }

  public function generate(Request $request){
    $request->validate([
			'coupon_id' => 'required',
			'quantity' => 'required|numeric'
    ]);
    
    $offer = Offer::find($request->coupon_id);
    $start = $offer->quantity + 1;
    $end = $offer->quantity + $request->quantity;
    
    for($i = $start; $i <= $end; $i++){
      $promocode = new Promocode();
      $promocode->offer_id = $offer->id;
      $promocode->code = $offer->prefix . $i;
      $promocode->qr_code = $this->imageLibraryService->createQR($offer->prefix . $i, 'qrs/promocodes');
      $promocode->save();
    }

    $offer->quantity = $end;
    $offer->save();

		return redirect()->route('promo-codes.index');
  }

	public function transform($promoCode){
		return [
			'id' => $promoCode->id,
      'coupon_name' => $promoCode->offer->name,
      'code' => $promoCode->code,
      'redeemed' => $promoCode->transaction_item ? 'Yes' : 'No'
		];
	}
}

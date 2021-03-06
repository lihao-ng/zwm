<?php

namespace App\Services\Api;

use App\User;
use App\Offer;

use App\Services\ImageLibraryService;
use App\Services\TransformerService;

use Illuminate\Http\Request;

class OfferServices extends TransformerService {
  protected $imageLibraryService;

  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

	public function index(Request $request) {
		$sort = $request->sort ? $request->sort : 'created_at';
		$order = $request->order ? $request->order : 'desc';
		$limit = $request->limit ? $request->limit : 10;
    $query = $request->search ? $request->search : '';
    $type = $request->type;

    // whereDate('inspection_date', '<=', Carbon::today())
    
    $offers = Offer::where('name', 'like', "%{$query}%")->orderBy($sort, $order);
    
    if ($type) {
      $offers->where('type', $type);
    }
    
		$offers = $offers->paginate($limit);
    $offers = $offers->toArray();
    $offers['data'] = $this->transformCollection($offers['data']);

    return $offers;
  }  

  public function getAllOffers($type, $merchantId) {
    $offers = Offer::where('type', $type)->where('merchant_id', $merchantId)->get();

    if(!$offers) {
      return false;
    }

    return $this->transformCollection($offers);
  }

  public function transform($offer) {
    $offer = Offer::find($offer['id']);

    return [
			'id' => $offer->id,
			'name' => $offer->name,
      'type' => $offer->type,
      'description' => $offer->description,
      'points' => $offer->points,
      'photo' => $this->imageLibraryService->fullPath($offer->photo)
		];
  }
}

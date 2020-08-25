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
		$limit = $request->limit ? $request->limit : 10;
    $query = $request->search ? $request->search : '';
    $type = $request->type;
    
    $offers = Offer::where('name', 'like', "%{$query}%");
    
    if ($type) {
      $offers->where('type', $type);
    }
    
		$offers = $offers->paginate($limit);
    $offers = $offers->toArray();
    $offers['data'] = $this->transformCollection($offers['data']);

    return $offers;
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

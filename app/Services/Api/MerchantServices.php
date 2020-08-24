<?php

namespace App\Services\Api;

use App\User;
use App\Merchant;

use App\Services\ImageLibraryService;
use App\Services\TransformerService;

use Illuminate\Http\Request;

class MerchantServices extends TransformerService {
  protected $imageLibraryService;

  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

	public function index(Request $request) {
		$limit = $request->limit ? $request->limit : 10;
    $query = $request->search ? $request->search : '';
    $category = $request->category;
    
    $merchants = Merchant::where('name', 'like', "%{$query}%");
    
    if ($category) {
      $merchants->where('category', $category);
    }
    
		$merchants = $merchants->paginate($limit);
    $merchants = $merchants->toArray();
    $merchants['data'] = $this->transformCollection($merchants['data']);

    return $merchants;
  }  

  public function show(Merchant $merchant) {
    return $this->transform($merchant);
  }

	public function transform($merchant) {
    $merchant = (object) $merchant;

		return [
			'id' => $merchant->id,
			'name' => $merchant->name,
      'category' => $merchant->category,
      'description' => $merchant->description,
      'contact' => $merchant->contact,
      'address' => $merchant->address,
      'lat' => $merchant->lat,
      'lng' => $merchant->lng,
      'business_hours' => $merchant->business_hours,
      'link' => $merchant->link,
      'other_information' => $merchant->other_information,
      'photo' => $this->imageLibraryService->fullPath($merchant->photo)
		];
	}
}

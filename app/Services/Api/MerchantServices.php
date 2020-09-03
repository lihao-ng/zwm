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
		$sort = $request->sort ? $request->sort : 'created_at';
		$order = $request->order ? $request->order : 'desc';
		$limit = $request->limit ? $request->limit : 10;
    $query = $request->search ? $request->search : '';
    $category = $request->category;
    
    $merchants = Merchant::where('name', 'like', "%{$query}%")->where('approved', 1)->orderBy($sort, $order);
    
    if ($category) {
      $merchants->where('category', $category);
    }
    
		$merchants = $merchants->paginate($limit);
    $merchants = $merchants->toArray();
    $merchants['data'] = $this->transformCollection($merchants['data']);

    return $merchants;
  }  

	public function transform($merchant) {
    $merchant = Merchant::find($merchant['id']);

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

<?php

namespace App\Services\Api;

use App\User;
use App\Merchant;

use App\Services\ImageLibraryService;
use App\Services\TransformerService;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    $categories = $request->categories;
    
    $merchants = Merchant::where('name', 'like', "%{$query}%")->where('approved', 1)->orderBy($sort, $order);
    
    if ($categories) {
      $merchants->whereIn('category', $categories);
    }
    
		$merchants = $merchants->paginate($limit);
    $merchants = $merchants->toArray();
    $merchants['data'] = $this->transformCollection($merchants['data']);

    return $merchants;
  }  

  public function nearby(Request $request) {
    $validator = Validator::make($request->all(), [
			"lat" => "required",
			"lng" => "required"
    ]);

    if ($validator->fails()) {
      return validation_error($validator->errors()->first()); 
    }

    $distance_select = sprintf(
      "           
      ( %d * acos( cos( radians(%s) ) " .
              " * cos( radians( lat ) ) " .
              " * cos( radians( lng ) - radians(%s) ) " .
              " + sin( radians(%s) ) * sin( radians( lat ) ) " .
          " ) " . 
      ")
        ",
      6371,               
      $request->lat,
      $request->lng,
      $request->lat
    );    
    
    $merchants =  Merchant::select('*')->having(DB::raw($distance_select), '<=', 15);

    if($request->categories) {
      $merchants = $merchants->whereIn('category', $request->categories);
    }

    return $merchants->get();
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

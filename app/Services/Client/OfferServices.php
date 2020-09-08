<?php

namespace App\Services\Client;

use App\Offer;
use App\Promocode;

use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\ImageLibraryService;

class OfferServices extends TransformerService{
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
   
		$offers = Offer::where('merchant_id', current_user()->merchant->id)->where('type', 'Promo')->where('name', 'like', "%{$query}%")->orderBy($sort, $order);
		$listCount = $offers->count();

		$offers = $offers->limit($limit)->offset($offset)->get();

		return respond(['rows' => $this->transformCollection($offers), 'total' => $listCount]);
  }

  public function create(Request $request){
    $request->validate([
			'name' => 'required|unique:offers',
			'points' => 'required|numeric',
			'prefix' => 'required|unique:offers',
			'quantity' => 'required',
			'description' => 'required',
      'photo' => 'required|image|max:2000'
    ]);
    
    $offer = new Offer();
    $offer->merchant_id = current_user()->merchant->id;
    $offer->name = $request->name;
    $offer->prefix = $request->prefix;
    $offer->quantity = $request->quantity;
    $offer->points = $request->points;
    $offer->type = 'Promo';
    $offer->description = $request->description;
    
    $photoName = $this->imageLibraryService->create($request->file('photo'), 'accepting-items');

    $offer->photo = $photoName;
    $offer->save();

    $this->generatePromocodes($offer);

		return redirect()->route('offers.index');
  }

  public function generatePromocodes($offer){
    $prefixExist = Promocode::where('code', 'LIKE', '%' . $offer->prefix . '%')->first();
    $start = 1;
    $end = $offer->quantity;
    
    if($prefixExist){
      $start = $offer->quantity;
      $end = $offer->quantity + $offer->quantity;
    }

    for($i = $start; $i <= $end; $i++){
      $promocode = new Promocode();
      $promocode->offer_id = $offer->id;
      $promocode->code = $offer->prefix . $i;
      // $promocode->qr_code = $this->imageLibraryService->createQR($offer->prefix . $i, 'qrs/promocodes');
      $promocode->save();
    }
  }
  
  public function update(Request $request, Offer $offer){
    $request->validate([
			'name' => 'required|unique:offers,name,' . $offer->id,
			'points' => 'required|numeric',
			'description' => 'required',
      'photo' => 'sometimes|image|max:2000'
    ]);

    if(!$offer->photo && !$request->photo) {
      return redirect()->back()->withInput()->withErrors('The photo field is required.');
    }
    
    $offer->name = $request->name;
    $offer->points = $request->points;
    $offer->description = $request->description;
    $offer->save();
    
    $offer->photo = $this->imageLibraryService->update($request->file('photo'), $offer->photo, 'offers');
    $offer->save();

		return redirect()->route('offers.index');
  }

	public function transform($offer){
		return [
			'id' => $offer->id,
      'name' => $offer->name,
      'points' => $offer->points,
      'prefix' => $offer->prefix,
      'quantity' => $offer->quantity,
      'description' => $offer->description,
			'photo' => $this->imageLibraryService->fullPath($offer->photo)
		];
	}
}

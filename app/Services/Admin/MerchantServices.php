<?php

namespace App\Services\Admin;

use App\Merchant;

use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\ImageLibraryService;

class MerchantServices extends TransformerService{
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

		$merchants = Merchant::where('name', 'like', "%{$query}%")->orderBy($sort, $order);
		$listCount = $merchants->count();

		$merchants = $merchants->limit($limit)->offset($offset)->get();

		return respond(['rows' => $this->transformCollection($merchants), 'total' => $listCount]);
  }
  
  public function update(Request $request, Merchant $merchant) {
    $request->validate([
			'category' => 'required',
			'name' => 'required',
			'description' => 'required',
			'address' => 'required',
			'business_hours' => 'required',
      'contact' => 'required',
      'link' => 'required',
      'other_information' => 'required',
      'photo' => 'sometimes|image|max:2000',
      'approved' => 'required'
    ]);
    
    if(!$merchant->photo && !$request->photo) {
      return redirect()->back()->withInput()->withErrors('The photo field is required.');
    }

    $merchant->name = $request->name;
    $merchant->category = $request->category;
    $merchant->description = $request->description;
    $merchant->contact = $request->contact;
    $merchant->address = $request->address;
    $merchant->lat = $request->lat;
    $merchant->lng = $request->lng;
    $merchant->business_hours = $request->business_hours;
    $merchant->link = $request->link;
    $merchant->other_information = $request->other_information;
    $merchant->approved = $request->approved == 'Approved' ? 1 : 0;

    $photoName = $this->imageLibraryService->update($request->file('photo'), $merchant->photo, 'merchants');
    
    $merchant->photo = $photoName;
    $merchant->save();

		return redirect()->route('admin.merchants.index');
  }

	public function transform($merchant){
		return [
			'id' => $merchant->id,
      'name' => $merchant->name,
      'email' => $merchant->user->email,
      'description' => $merchant->description,
			'category' => $merchant->category,
			'contact' => $merchant->contact,
      'address' => $merchant->address,
      'lat' => $merchant->lat,
      'lng' => $merchant->lng,
			'business_hours' => $merchant->business_hours,
			'link' => $merchant->link,
			'other_information' => $merchant->other_information,
			'photo' => $this->imageLibraryService->fullPath($merchant->photo),
			'approved' => $merchant->approved ? 'Approved' : 'Not Approved'
		];
	}
}

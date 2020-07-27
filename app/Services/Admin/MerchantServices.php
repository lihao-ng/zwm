<?php

namespace App\Services\Admin;

use Illuminate\Http\Request;
use App\Services\TransformerService;

use App\Merchant;

class MerchantServices extends TransformerService{

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
      'photo' => 'required',
      'approved' => 'required'
		]);

    $merchant->name = $request->name;
    $merchant->category = $request->category;
    $merchant->description = $request->description;
    $merchant->contact = $request->contact;
    $merchant->address = $request->address;
    // $merchant->lat = $request->lat;
    // $merchant->lng = $request->lng;
    $merchant->business_hours = $request->business_hours;
    $merchant->link = $request->link;
    $merchant->other_information = $request->other_information;
    $merchant->approved = $request->approved == 'Approved' ? 1 : 0;

    // Upload/update file

    $merchant->save();

		return redirect()->route('admin.merchants.index');
  }

	public function getToVerify($request){
		
		$sort = $request->sort ? $request->sort : 'created_at';
		$order = $request->order ? $request->order : 'desc';
		$limit = $request->limit ? $request->limit : 10;
		$offset = $request->offset ? $request->offset : 0;
		$query = $request->search ? $request->search : '';

		$merchants = Merchant::where('is_verified', 0)->where('first_name', 'like', "%{$query}%")->orderBy($sort, $order);
		// $merchants = Merchant::where('is_verified', 0)->get();

		// dd("getToVerify",	$merchants);
		$listCount =	$merchants->count();
		$merchants = $merchants->limit($limit)->offset($offset)->get();


		return respond(['rows' => $this->transformCollection($merchants), 'total' => $listCount]);
	}

	// public function searchProducts($product){
	// 	$products = Product::where('name', 'like', "%{$product}%")->get();
  //
	// 	return $products;
	// }

	public function transform($merchant){

		$descLength = strlen($merchant->description);

		if($descLength>100){
			$shortDescription = substr($merchant->description, 0, 100) . " . . .";
		}
		else{
			$shortDescription = $merchant->description;
		}

		return [
			'id' => $merchant->id,
      'name' => $merchant->name,
      'email' => $merchant->user->email,
      'description' => $merchant->description,
			'category' => $merchant->category,
			'contact' => $merchant->contact,
			'address' => $merchant->address,
			'business_hours' => $merchant->business_hours,
			'link' => $merchant->link,
			'other_information' => $merchant->other_information,
			'photo' => $merchant->photo,
			'approved' => $merchant->approved ? 'Approved' : 'Not Approved'
		];
	}
}

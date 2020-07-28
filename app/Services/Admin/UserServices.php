<?php

namespace App\Services\Admin;

use App\Customer;

use Illuminate\Http\Request;
use App\Services\TransformerService;

class UserServices extends TransformerService{
	public function index($request){
		$sort = $request->sort ? $request->sort : 'created_at';
		$order = $request->order ? $request->order : 'desc';
		$limit = $request->limit ? $request->limit : 10;
		$offset = $request->offset ? $request->offset : 0;
    $query = $request->search ? $request->search : '';
    
    $customers = Customer::whereHas('user', function($q) use ($query){
      $q->where('first_name', 'like', "%{$query}%")->orWhere('last_name', 'like', "%{$query}%");
    });
		$listCount = $customers->count();

		$customers = $customers->limit($limit)->offset($offset)->get();

		return respond(['rows' => $this->transformCollection($customers), 'total' => $listCount]);
  }

	public function transform($customer){
    $user = $customer->user;

		return [
			'id' => $customer->id,
      'name' => $user->first_name . ' ' . $user->last_name,
      'email' => $user->email,
      'gender' => $user->gender,
      'total_points' => $customer->total_points,
      'current_points' => $customer->current_points,
      'code' => $customer->code,
			// 'code' => $this->imageLibraryService->fullPath($customer->photo),
			// 'photo' => $this->imageLibraryService->fullPath($customer->photo)
		];
	}
}

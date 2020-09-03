<?php

namespace App\Services\Client;

use App\Offer as AcceptingItem;

use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\ImageLibraryService;

class AcceptingItemServices extends TransformerService{
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
    $ids = $request->ids ? json_decode($request->ids) : [];
    
		$acceptingItems = AcceptingItem::whereNotIn('id', $ids)->where('merchant_id', current_user()->merchant->id)->where('type', 'Accepting Items')->where('name', 'like', "%{$query}%")->orderBy($sort, $order);
		$listCount = $acceptingItems->count();

		$acceptingItems = $acceptingItems->limit($limit)->offset($offset)->get();
    
		return respond(['rows' => $this->transformCollection($acceptingItems), 'total' => $listCount]);
  }

  public function create(Request $request){
    $request->validate([
			'name' => 'required|unique:offers',
			'points' => 'required|numeric',
			'description' => 'required',
      'photo' => 'required|image|max:2000'
    ]);
    
    $acceptingItem = new AcceptingItem();
    $acceptingItem->merchant_id = current_user()->merchant->id;
    $acceptingItem->name = $request->name;
    $acceptingItem->points = $request->points;
    $acceptingItem->type = 'Accepting Items';
    $acceptingItem->description = $request->description;
    
    $photoName = $this->imageLibraryService->create($request->file('photo'), 'accepting-items');

    $acceptingItem->photo = $photoName;
    $acceptingItem->save();

		return redirect()->route('accepting-items.index');
  }
  
  public function update(Request $request, AcceptingItem $acceptingItem){
    $request->validate([
			'name' => 'required|unique:offers,name,' . $acceptingItem->id,
			'points' => 'required|numeric',
			'description' => 'required',
      'photo' => 'sometimes|image|max:2000'
    ]);

    if(!$acceptingItem->photo && !$request->photo) {
      return redirect()->back()->withInput()->withErrors('The photo field is required.');
    }
    
    $acceptingItem->name = $request->name;
    $acceptingItem->points = $request->points;
    $acceptingItem->description = $request->description;
    $acceptingItem->save();
    
    $acceptingItem->photo = $this->imageLibraryService->update($request->file('photo'), $acceptingItem->photo, 'accepting-items');
    $acceptingItem->save();

		return redirect()->route('accepting-items.index');
  }

	public function transform($acceptingItem){
		return [
			'id' => $acceptingItem->id,
      'name' => $acceptingItem->name,
      'points' => $acceptingItem->points,
      'description' => $acceptingItem->description,
			'photo' => $this->imageLibraryService->fullPath($acceptingItem->photo)
		];
	}
}

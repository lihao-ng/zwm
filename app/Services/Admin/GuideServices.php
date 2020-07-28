<?php

namespace App\Services\Admin;

use App\Guide;
use App\Rules\PhotoValidation;
use App\Rules\EisRange;

use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\ImageLibraryService;

class GuideServices extends TransformerService{
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

		$guides = Guide::where('name', 'like', "%{$query}%")->orderBy($sort, $order);
		$listCount = $guides->count();

		$guides = $guides->limit($limit)->offset($offset)->get();

		return respond(['rows' => $this->transformCollection($guides), 'total' => $listCount]);
  }

  public function create(Request $request){
    $request->validate([
			'name' => 'required|unique:guides',
			'category' => 'required|in:Metal,Plastic,Paper,Fabric,Glass,E-Waste',
      'photo' => 'required|image|max:2000',
			'description' => 'required',
			'recyclable' => 'required|in:Yes,No',
			'photo_upcycling' => 'nullable|image|max:2000',
      'description_upcycling' => 'nullable'
    ]);
    
    $guide = new Guide();
    $guide->name = $request->name;
    $guide->category = $request->category;
    $guide->description = $request->description;
    $guide->recyclable = $request->recyclable == 'Yes' ? 1 : 0;
    $guide->description_upcycling = $request->description_upcycling;
    
    $photoName = $this->imageLibraryService->create($request->file('photo'), 'guides');
    $photoUpName = $this->imageLibraryService->create($request->file('photo_upcycling'), 'guides');
    
    $guide->photo = $photoName;
    $guide->photo_upcycling = $photoUpName;

    $guide->save();

		return redirect()->route('admin.guides.index');
  }
  
  public function update(Request $request, Guide $guide){
    $request->validate([
			'name' => 'required|unique:guides,name,' . $guide->id,
			'category' => 'required|in:Metal,Plastic,Paper,Fabric,Glass,E-Waste',
      'photo' => 'sometimes|image|max:2000',
			'description' => 'required',
			'recyclable' => 'required|in:Yes,No',
			'photo_upcycling' => 'nullable|image|max:2000',
      'description_upcycling' => 'nullable'
    ]);

    if(!$guide->photo && !$request->photo) {
      return redirect()->back()->withInput()->withErrors('The photo field is required.');
    }

    $guide->name = $request->name;
    $guide->category = $request->category;
    $guide->description = $request->description;
    $guide->recyclable = $request->recyclable == 'Yes' ? 1 : 0;
    $guide->description_upcycling = $request->description_upcycling;

    $photoName = $this->imageLibraryService->update($request->file('photo'), $guide->photo, 'guides');
    $photoUpName = $this->imageLibraryService->update($request->file('photo_upcycling'), $guide->photo_upcycling, 'guides');

    $guide->photo = $photoName;
    $guide->photo_upcycling = $photoUpName;

    $guide->save();

		return redirect()->route('admin.guides.index');
  }

	public function transform($guide){
		return [
			'id' => $guide->id,
      'name' => $guide->name,
			'category' => $guide->category,
      'description' => $guide->description,
			'photo' => $guide->photo,
			'recyclable' => $guide->recyclable ? 'Yes' : 'No',
      'photo_upcycling' => $guide->photo_upcycling,
      'description_upcycling' => $guide->description_upcycling,
		];
	}
}

<?php

namespace App\Services\Admin;

use App\Guide;
use App\GuideContent;

use Illuminate\Http\Request;
use App\Services\Admin\GuideContentServices;
use App\Services\TransformerService;
use App\Services\ImageLibraryService;

class GuideServices extends TransformerService{
  protected $imageLibraryService;
  protected $guideContentServices;

  function __construct(ImageLibraryService $imageLibraryService, GuideContentServices $guideContentServices) {
    $this->imageLibraryService = $imageLibraryService;
    $this->guideContentServices = $guideContentServices;
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
      // 'photo' => 'required|image|max:2000',
			'description' => 'required',
      'recyclable' => 'required|in:Yes,No',
      'contents' => 'required',
			// 'photo_upcycling' => 'nullable|image|max:2000',
      // 'description_upcycling' => 'nullable'
    ]);
    
    $guide = new Guide();
    $guide->name = $request->name;
    $guide->category = $request->category;
    $guide->description = $request->description;
    $guide->recyclable = $request->recyclable == 'Yes' ? 1 : 0;
    $guide->description_upcycling = $request->description_upcycling;
    $guide->save();

    foreach(json_decode($request->contents) as $content) {
      $createdGuideContent = new GuideContent();
      $createdGuideContent->guide_id = $guide->id;
      $createdGuideContent->name = $content->name;
      $createdGuideContent->description = $content->description;
      $createdGuideContent->save();
    }
    
    // $photoName = $this->imageLibraryService->create($request->file('photo'), 'guides');
    // $photoUpName = $this->imageLibraryService->create($request->file('photo_upcycling'), 'guides');
    
    // $guide->photo = $photoName;
    // $guide->photo_upcycling = $photoUpName;

		return route('admin.guides.index');
  }
  
  public function update(Request $request, Guide $guide){
    $request->validate([
			'name' => 'required|unique:guides,name,' . $guide->id,
			'category' => 'required|in:Metal,Plastic,Paper,Fabric,Glass,E-Waste',
      // 'photo' => 'sometimes|image|max:2000',
			'description' => 'required',
      'recyclable' => 'required|in:Yes,No',
      'contents' => 'required',
			// 'photo_upcycling' => 'nullable|image|max:2000',
      // 'description_upcycling' => 'nullable'
    ]);

    // if(!$guide->photo && !$request->photo) {
    //   return redirect()->back()->withInput()->withErrors('The photo field is required.');
    // }

    $guide->name = $request->name;
    $guide->category = $request->category;
    $guide->description = $request->description;
    $guide->recyclable = $request->recyclable == 'Yes' ? 1 : 0;
    $guide->description_upcycling = $request->description_upcycling;
    $guide->save();

    foreach(json_decode($request->contents) as $content) {
      if(!empty($content->deleted)) {
        $guideContent = GuideContent::find($content->id);
       
        $guideContent->delete();
      }elseif($content->id != -1) {
        $guideContent = GuideContent::find($content->id);
        $guideContent->guide_id = $guide->id;
        $guideContent->name = $content->name;
        $guideContent->description = $content->description;

        $guideContent->save();
      } else {
        $guideContent = new GuideContent();
        $guideContent->guide_id = $guide->id;
        $guideContent->name = $content->name;
        $guideContent->description = $content->description;
        
        $guideContent->save();
      }  
    }

    // $photoName = $this->imageLibraryService->update($request->file('photo'), $guide->photo, 'guides');
    // $photoUpName = $this->imageLibraryService->update($request->file('photo_upcycling'), $guide->photo_upcycling, 'guides');

    // $guide->photo = $photoName;
    // $guide->photo_upcycling = $photoUpName;
    
		return route('admin.guides.index');
  }

	public function transform($guide){
		return [
			'id' => $guide->id,
      'name' => $guide->name,
			'category' => $guide->category,
      'description' => $guide->description,
			'photo' => $this->imageLibraryService->fullPath($guide->photo),
			'recyclable' => $guide->recyclable ? 'Yes' : 'No',
      'photo_upcycling' => $this->imageLibraryService->fullPath($guide->photo_upcycling),
      'description_upcycling' => $guide->description_upcycling,
      'contents' => $this->guideContentServices->transformCollection($guide->contents)
		];
	}
}

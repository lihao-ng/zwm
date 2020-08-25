<?php

namespace App\Services\Api;

use App\User;
use App\Guide;

use App\Services\ImageLibraryService;
use App\Services\TransformerService;

use Illuminate\Http\Request;

class GuideServices extends TransformerService {
  protected $imageLibraryService;

  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

	public function index(Request $request) {
		$limit = $request->limit ? $request->limit : 10;
    $query = $request->search ? $request->search : '';
    $category = $request->category;
    
    $guides = Guide::where('name', 'like', "%{$query}%")->where('category', 'like', "%{$category}%");
    
		$guides = $guides->paginate($limit);
    $guides = $guides->toArray();
    $guides['data'] = $this->transformCollection($guides['data']);

    return $guides;
  }  

	public function transform($guide) {
    $guide = Guide::find($guide['id']);

		return [
			'id' => $guide->id,
			'name' => $guide->name,
      'category' => $guide->category,
      'photo' => $this->imageLibraryService->fullPath($guide->photo),
      'description' => $guide->description,
      'recyclable' => $guide->recyclable ? 'Recyclable' : 'Not Recyclable',
      'photo_upcycling' => $this->imageLibraryService->fullPath($guide->photo_upcycling),
      'description_upcycling' => $guide->description_upcycling
		];
  }
}

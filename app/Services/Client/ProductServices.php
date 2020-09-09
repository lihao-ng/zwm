<?php

namespace App\Services\Client;

use App\Product;

use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\ImageLibraryService;

class ProductServices extends TransformerService{
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
    
		$products = Product::whereHas('category', function($q) {
      $q->where('merchant_id', current_user()->merchant->id);
    })->where('name', 'like', "%{$query}%")->orderBy($sort, $order);

		$listCount = $products->count();

		$products = $products->limit($limit)->offset($offset)->get();
    
		return respond(['rows' => $this->transformCollection($products), 'total' => $listCount]);
  }

  public function create(Request $request){
    $request->validate([
      'category_id' => 'required',
			'name' => 'required',
			'description' => 'required',
			'price' => 'required|numeric',
      'photo' => 'required|image|max:2000'
    ]);
    
    $product = new Product();
    $product->category_id = $request->category_id;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    
    $photoName = $this->imageLibraryService->create($request->file('photo'), 'products');

    $product->photo = $photoName;
    $product->save();

		return redirect()->route('products.index');
  }
  
  public function update(Request $request, Product $product){
    $request->validate([
      'category_id' => 'required',
			'name' => 'required',
			'description' => 'required',
			'price' => 'required|numeric',
      'photo' => 'sometimes|image|max:2000'
    ]);

    if(!$product->photo && !$request->photo) {
      return redirect()->back()->withInput()->withErrors('The photo field is required.');
    }
    
    $product->category_id = $request->category_id;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->save();
    
    $product->photo = $this->imageLibraryService->update($request->file('photo'), $product->photo, 'products');
    $product->save();

		return redirect()->route('products.index');
  }

	public function transform($product){
		return [
      'id' => $product->id,
      'category' => $product->category->name,
      'category_id' => $product->category->id,
      'name' => $product->name,
      'description' => $product->description,
      'price' => $product->price,
			'photo' => $this->imageLibraryService->fullPath($product->photo)
		];
	}
}

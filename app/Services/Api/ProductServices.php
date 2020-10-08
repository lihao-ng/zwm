<?php

namespace App\Services\Api;

use App\Merchant;
use App\Category;
use App\Product;

use App\Services\Api\OfferServiceServices;
use App\Services\ImageLibraryService;
use App\Services\TransformerService;

use Illuminate\Http\Request;

class ProductServices extends TransformerService {
  protected $imageLibraryService;

  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

	public function index(Request $request, Merchant $merchant) {
    $merchantCategories = Category::where('merchant_id', $merchant->id)->get();

    $offers = [];
    $categories = [];
    $products = [];
    
    foreach($merchantCategories as $category) {
      array_push($categories, $category->name);
      array_push($products, $this->transformCollection(Product::where('category_id', $category->id)->get()));
    }

    $offerServices = new OfferServices($this->imageLibraryService);
    $acceptingItems = $offerServices->getAllOffers('Accepting Items', $merchant->id);

    if($acceptingItems) {
      array_unshift($categories, 'Accepting Items');
      array_push($offers, $acceptingItems);
    }

    $promos = $offerServices->getAllOffers('Promo', $merchant->id);
    
    if($promos) {
      array_unshift($categories, 'Rewards');
      array_push($offers, $promos);
    }
    
    return [
      'categories' => $categories,
      'offers' => $offers,
      'products' => $products
    ];
  }  

  public function search(Request $request) { 
    $sort = $request->sort ? $request->sort : 'created_at';
		$order = $request->order ? $request->order : 'asc';
    $limit = $request->limit ? $request->limit : 10;
    $query = $request->search ? $request->search : '';
    
    return $this->transformCollection(Product::where('name', 'like', "%{$query}%")->orderBy($sort, $order)->limit($limit)->get());
  }

	public function transform($product) {
		return [
      'id' => $product->id,
      'merchant_id' => $product->category->merchant->id,
			'name' => $product->name,
      'category' => $product->category->name,
      'description' => $product->description,
      'price' => $product->price,
      'photo' => $this->imageLibraryService->fullPath($product->photo)
		];
  }
}

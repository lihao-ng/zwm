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

    $categories = [];
    $products = [];
    
    foreach($merchantCategories as $category) {
      array_push($categories, $category->name);
      array_push($products, $this->transformCollection(Product::where('category_id', $category->id)->get()));
    }

    $offerServices = new OfferServices($this->imageLibraryService);
    $offers = $offerServices->getAllOffers('Accepting Items');

    if($offers) {
      array_unshift($categories, 'Accepting Items');
      array_unshift($products, $offers);
    }

    $offers = $offerServices->getAllOffers('Promo');
    
    if($offers) {
      array_unshift($categories, 'Rewards');
      array_unshift($products, $offers);
    }
    
    return [
      'categories' => $categories,
      'products' => $products
    ];
  }  

  public function search(Request $request) { 
    $query = $request->search ? $request->search : '';
   
    return $this->transformCollection(Product::where('name', 'like', "%{$query}%")->get());
  }

	public function transform($product) {
		return [
			'id' => $product->id,
			'name' => $product->name,
      'category' => $product->category->name,
      'description' => $product->description,
      'price' => $product->price,
      'photo' => $this->imageLibraryService->fullPath($product->photo)
		];
  }
}

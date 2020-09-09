<?php

namespace App\Http\Controllers\Client;

use App\Product;
use App\Category;

use App\Services\Client\ProductServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'client.products.';

	protected $productServices;

	public function __construct(ProductServices $productServices){
		$this->productServices = $productServices;
	}


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->wantsJson()) {
      return $this->productServices->index($request);
    }

		return view(self::PATH . 'index');
  }

  public function create(Request $request){
    $categories = Category::where('merchant_id', current_user()->merchant->id)->pluck('name', 'id');

		return view(self::PATH . 'create', ['categories' => $categories]);
  }

  public function store(Request $request){
    return $this->productServices->create($request);  
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product){
    $categories = Category::where('merchant_id', current_user()->merchant->id)->pluck('name', 'id');

		return view(self::PATH . 'edit', ['product' => (object) $this->productServices->transform($product), 'categories' => $categories]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product){
    return $this->productServices->update($request, $product);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product){
    $product->delete();
    
		return success();
	}
}

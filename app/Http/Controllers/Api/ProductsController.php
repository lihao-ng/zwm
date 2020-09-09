<?php

namespace App\Http\Controllers\Api;

use App\Merchant;

use App\Services\Api\ProductServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller{
	protected $productServices;

	function __construct(ProductServices $productServices){
    $this->productServices = $productServices;
	}

	public function index(Request $request, Merchant $merchant) {
		return $this->productServices->index($request, $merchant);
  }
  
  public function search(Request $request) {
    return $this->productServices->search($request);
	}
}

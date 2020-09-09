<?php

namespace App\Services\Client;

use App\Category;

use Illuminate\Http\Request;
use App\Services\TransformerService;

class CategoryServices extends TransformerService{
	public function index($request){
		$sort = $request->sort ? $request->sort : 'created_at';
		$order = $request->order ? $request->order : 'desc';
		$limit = $request->limit ? $request->limit : 10;
		$offset = $request->offset ? $request->offset : 0;
		$query = $request->search ? $request->search : '';
    $ids = $request->ids ? json_decode($request->ids) : [];
    
		$categories = Category::where('merchant_id', current_user()->merchant->id)->where('name', 'like', "%{$query}%")->orderBy($sort, $order);
		$listCount = $categories->count();

		$categories = $categories->limit($limit)->offset($offset)->get();
    
		return respond(['rows' => $this->transformCollection($categories), 'total' => $listCount]);
  }

  public function create(Request $request){
    $merchant = current_user()->merchant;

    $request->validate([
      'name' => 'unique:categories,name,NULL,id,merchant_id,' . $merchant->id
    ]);
    
    $category = new Category();
    $category->merchant_id = $merchant->id;
    $category->name = $request->name;
    $category->save();

		return redirect()->route('categories.index');
  }
  
  public function update(Request $request, Category $category){
    $merchant = current_user()->merchant;

    $request->validate([
      'name' => 'unique:categories,name,' . $category->id . ',id,merchant_id,' . $merchant->id
    ]);
    
    $category->name = $request->name;
    $category->save();
    
		return redirect()->route('categories.index');
  }

	public function transform($category){
		return [
			'id' => $category->id,
      'name' => $category->name
		];
	}
}

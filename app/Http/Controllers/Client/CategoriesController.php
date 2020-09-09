<?php

namespace App\Http\Controllers\Client;

use App\Category;
use App\Services\Client\CategoryServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'client.categories.';

	protected $categoryServices;

	public function __construct(CategoryServices $categoryServices){
		$this->categoryServices = $categoryServices;
	}


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->wantsJson()) {
      return $this->categoryServices->index($request);
    }

		return view(self::PATH . 'index');
  }

  public function create(Request $request){
		return view(self::PATH . 'create');
  }

  public function store(Request $request){
    return $this->categoryServices->create($request);  
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category){
		return view(self::PATH . 'edit', ['category' => (object) $this->categoryServices->transform($category)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category){
    return $this->categoryServices->update($request, $category);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category){
    $category->delete();
    
		return success();
	}
}

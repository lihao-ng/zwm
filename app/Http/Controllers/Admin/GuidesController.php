<?php

namespace App\Http\Controllers\Admin;

use App\Guide;
use App\Services\Admin\GuideServices;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuidesController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'admin.guide.';

	protected $guideServices;

	public function __construct(GuideServices $guideServices){
		$this->guideServices = $guideServices;
	}


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->wantsJson()) {
      return $this->guideServices->index($request);
    }

		return view(self::PATH . 'index');
  }

  public function create(Request $request){
		return view(self::PATH . 'create');
  }

  public function store(Request $request){
    return $this->guideServices->create($request);  
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Guide $guide){
		return view(self::PATH . 'edit', ['guide' => (object) $this->guideServices->transform($guide)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Guide $guide){
    return $this->guideServices->update($request, $guide);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Guide $guide){
    $guide->delete();
    
		return success();
	}
}

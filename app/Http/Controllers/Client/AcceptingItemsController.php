<?php

namespace App\Http\Controllers\Client;

use App\Offer as AcceptingItem;
use App\Services\Client\AcceptingItemServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcceptingItemsController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'client.accepting-item.';

	protected $acceptingItemServices;

	public function __construct(AcceptingItemServices $acceptingItemServices){
		$this->acceptingItemServices = $acceptingItemServices;
	}


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->wantsJson()) {
      return $this->acceptingItemServices->index($request);
    }

		return view(self::PATH . 'index');
  }

  public function create(Request $request){
		return view(self::PATH . 'create');
  }

  public function store(Request $request){
    return $this->acceptingItemServices->create($request);  
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(AcceptingItem $acceptingItem){
		return view(self::PATH . 'edit', ['acceptingItem' => (object) $this->acceptingItemServices->transform($acceptingItem)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, AcceptingItem $acceptingItem){
    return $this->acceptingItemServices->update($request, $acceptingItem);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(AcceptingItem $acceptingItem){
    $acceptingItem->delete();
    
		return success();
	}
}

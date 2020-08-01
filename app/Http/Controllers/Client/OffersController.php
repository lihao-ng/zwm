<?php

namespace App\Http\Controllers\Client;

use App\Offer;
use App\Services\Client\OfferServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OffersController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'client.offer.';

	protected $offerServices;

	public function __construct(OfferServices $offerServices){
		$this->offerServices = $offerServices;
  }
  
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->wantsJson()) {
      return $this->offerServices->index($request);
    }

		return view(self::PATH . 'index');
  }

  public function create(Request $request){
		return view(self::PATH . 'create');
  }

  public function store(Request $request){
    return $this->offerServices->create($request);  
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Offer $offer){
		return view(self::PATH . 'edit', ['offer' => (object) $this->offerServices->transform($offer)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Offer $offer){
    return $this->offerServices->update($request, $offer);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Offer $offer){
    $offer->delete();
    
		return success();
	}
}

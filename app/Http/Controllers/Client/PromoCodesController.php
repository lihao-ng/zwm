<?php

namespace App\Http\Controllers\Client;

use App\PromoCode;
use App\Offer;
use App\Services\Client\PromoCodeServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromoCodesController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'client.promo-code.';

	protected $promoCodeServices;

	public function __construct(PromoCodeServices $promoCodeServices){
		$this->promoCodeServices = $promoCodeServices;
  }
  
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->wantsJson()) {
      return $this->promoCodeServices->index($request);
    }

		return view(self::PATH . 'index');
  }

  public function create(Request $request){
    $offers = Offer::where('merchant_id', current_user()->merchant->id)->where('type', 'Promo')->pluck('name', 'id');

		return view(self::PATH . 'create', ['offers' => $offers]);
  }

  public function store(Request $request){
    return $this->promoCodeServices->create($request);  
  }

  public function show(PromoCode $promoCode){
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(PromoCode $promoCode){
		return view(self::PATH . 'edit', ['promoCode' => (object) $this->promoCodeServices->transform($promoCode)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, PromoCode $promoCode){
    return $this->promoCodeServices->update($request, $promoCode);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(PromoCode $promoCode){
    $promoCode->delete();
    
		return success();
  }
  
  public function showGenerate(Request $request){
    $offers = Offer::where('merchant_id', current_user()->merchant->id)->where('type', 'Promo')->pluck('name', 'id');

		return view(self::PATH . 'generate', ['offers' => $offers]);
  }

  public function generate(Request $request){
    return $this->promoCodeServices->generate($request);
  }

  public function showRedemption(Request $request){
		return view(self::PATH . 'redemption');
  }

  public function redemption(Request $request){
    return $this->promoCodeServices->redemption($request);
  }
}

<?php

namespace App\Http\Controllers\Client;

use App\Transaction;
use App\Services\Client\AwardPointServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AwardPointsController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'client.award-point.';

	protected $awardPointServices;

	public function __construct(AwardPointServices $awardPointServices){
		$this->awardPointServices = $awardPointServices;
	}

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		return view(self::PATH . 'index');
  }

  public function store(Request $request){
    return $this->awardPointServices->create($request);  
  }
}

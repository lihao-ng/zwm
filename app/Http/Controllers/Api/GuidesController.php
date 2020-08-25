<?php

namespace App\Http\Controllers\Api;

use App\Guide;

use App\Services\Api\GuideServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuidesController extends Controller{
	protected $guideServices;

	function __construct(GuideServices $guideServices){
    $this->guideServices = $guideServices;
	}

	public function index(Request $request) {
		return $this->guideServices->index($request);
  }
  
  public function show(Request $request, Guide $guide) {
    return $this->guideServices->transform($guide);
	}
}

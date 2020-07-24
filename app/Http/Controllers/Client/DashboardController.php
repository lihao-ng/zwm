<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

	protected $path = 'client.dashboard.';

	public function index(){
		return view($this->path . 'index');
	}
}

<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Guide;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

	protected $path = 'admin.dashboard.';

	public function index(){
    $totalMerchants = User::where('role_id', 2)->count();
    $totalUsers = User::where('role_id', 3)->count();
    $totalGuides = Guide::count();
    
		return view($this->path . 'index', ['totalMerchants' => $totalMerchants, 'totalUsers' => $totalUsers, 'totalGuides' => $totalGuides]);
	}
}

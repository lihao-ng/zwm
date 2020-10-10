<?php

namespace App\Http\Controllers\Client;

use App\Offer;
use App\Transaction;
use App\Promocode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

	protected $path = 'client.dashboard.';

	public function index(){
    $merchant = current_user()->merchant;

    $totalOffers = Offer::where('merchant_id', $merchant->id)->where('type', 'Promo')->count();
    $totalAcceptingPoints = Transaction::where('merchant_id', $merchant->id)->where('type', 'Award')->sum('total_points');

    $offers = Offer::where('merchant_id', $merchant->id)->withCount(['promocodes' => function ($q) {
      $q->where('used', 1);
    }])->get();

    $totalPromoPoints = 0;

    foreach($offers as $offer) {
      $totalPromoPoints += $offer->points * $offer->promocodes_count;
    }
    
    return view($this->path . 'index', ['totalOffers' => $totalOffers, 'totalPromoPoints' => $totalPromoPoints, 'totalAcceptingPoints' => $totalAcceptingPoints]);
  }
}

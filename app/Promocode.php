<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model {
  protected $fillable = [
    'offer_id',
    'code',
    'redeemed'
  ]; 

  public function transaction_item(){
    return $this->belongsTo('App\TransactionItem');
  }

  public function offer(){
    return $this->belongsTo('App\Offer');
  }
}

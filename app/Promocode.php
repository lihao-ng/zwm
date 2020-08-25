<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model {
  protected $fillable = [
    'offer_id',
    'customer_id',
    'transaction_item_id',
    'code',
    'qr_code',
    'redeemed',
  ]; 

  public function transaction_item(){
    return $this->belongsTo('App\TransactionItem');
  }

  public function offer(){
    return $this->belongsTo('App\Offer');
  }
}

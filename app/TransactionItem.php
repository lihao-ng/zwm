<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionItem extends Model {
  use SoftDeletes;
  
  protected $fillable = [
    'transaction_id',
    'offer_id',
    'promocode_id',
    'quantity',
    'points'
  ]; 

  public function transaction(){
    return $this->belongsTo('App\Transaction');
  }

  public function offer(){
    return $this->belongsTo('App\Offer');
  }
}

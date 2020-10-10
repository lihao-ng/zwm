<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model {
  use SoftDeletes;
  
  protected $fillable = [
    'offer_id',
    'customer_id',
    'code',
    'qr_code',
    'redeemed',
  ]; 

  public function offer(){
    return $this->belongsTo('App\Offer');
  }
}

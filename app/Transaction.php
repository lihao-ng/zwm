<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model {
  use SoftDeletes;
  
  protected $fillable = [
    'customer_id',
    'merchant_id',
    'type',
    'total_points'
  ]; 

  public function transaction_items(){
    return $this->hasMany('App\TransactionItem');
  }

  public function custom_items(){
    return $this->hasMany('App\CustomItem');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model {
  protected $fillable = [
    'transaction_id',
    'offer_id',
    'promocode_id',
    'quantity',
    'points'
  ]; 
}

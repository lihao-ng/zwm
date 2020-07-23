<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model {
  protected $fillable = [
    'offer_id',
    'code',
    'redeemed'
  ]; 
}

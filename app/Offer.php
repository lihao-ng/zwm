<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model {
  protected $fillable = [
    'merchant_id',
    'name',
    'type',
    'description',
    'points',
    'photo'
  ]; 
}

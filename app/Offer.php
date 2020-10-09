<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model {
  use SoftDeletes;
  
  protected $fillable = [
    'merchant_id',
    'name',
    'type',
    'prefix',
    'quantity',
    'description',
    'points',
    'photo'
  ]; 

  public function merchant(){
    return $this->belongsTo('App\Merchant');
  }

  public function promocodes(){
    return $this->hasMany('App\Promocode');
  }

  public static function boot() {
    parent::boot();

    static::deleting(function($offer) { 
      $offer->promocodes()->delete();
    });
  }
}

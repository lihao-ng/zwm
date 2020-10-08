<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model {
  protected $fillable = [
    'user_id',
    'name',
    'category',
    'description',
    'contact',
    'address',
    'lat',
    'lng',
    'business_hours',
    'link',
    'other_information',
    'photo',
    'approved'
  ]; 

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function offers() {
    return $this->hasMany('App\Offer');
  }

  public function categories() {
    return $this->hasMany('App\Category');
  }

  public static function boot() {
    parent::boot();

    static::deleting(function($merchant) { 
      $merchant->offers()->delete(); 
      $merchant->categories()->delete();
      $merchant->user()->delete();
    });
  }
}

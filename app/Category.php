<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
  protected $fillable = [
    'merchant_id',
    'name'
  ]; 

  public function merchant(){
    return $this->belongsTo('App\Merchant');
  }

  public function products(){
    return $this->hasMany('App\Product');
  }

  public static function boot() {
    parent::boot();

    static::deleting(function($category) { 
      $category->products()->delete();
    });
  }
}

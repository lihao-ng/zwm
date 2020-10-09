<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
  use SoftDeletes;
  
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

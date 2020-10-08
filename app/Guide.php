<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model {
  protected $fillable = [
    'name',
    'photo',
    'description',
    'category',
    'recyclable'
  ];
  
  public function contents(){
    return $this->hasMany('App\GuideContent');
  }
 
  public static function boot() {
    parent::boot();

    static::deleting(function($guide) { 
      $guide->contents()->delete();
    });
  }
}

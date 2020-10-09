<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
  use SoftDeletes;
  
  protected $fillable = [
    'category_id',
    'name',
    'description',
    'price',
    'photo'
  ]; 

  public function category(){
    return $this->belongsTo('App\Category');
  }
}

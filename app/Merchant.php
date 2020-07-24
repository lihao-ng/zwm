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

  public function user(){
    return $this->belongsTo('App\User');
  }
}

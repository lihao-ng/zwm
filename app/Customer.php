<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model {
  use SoftDeletes;
  
  protected $fillable = [
    'user_id',
    'total_points',
    'current_points',
    'code',
    'qr_code'
  ]; 

  public function user(){
    return $this->belongsTo('App\User');
  }

  public static function boot() {
    parent::boot();

    static::deleting(function($customer) { 
      $customer->user()->delete();
    });
  }
}

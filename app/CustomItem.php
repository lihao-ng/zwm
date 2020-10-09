<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomItem extends Model{
  use SoftDeletes;
  
  protected $fillable = [
    'transaction_id',
    'description',
    'points'
  ]; 

  public function transaction(){
    return $this->belongsTo('App\Transaction');
  }
}

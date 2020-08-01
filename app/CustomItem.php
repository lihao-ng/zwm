<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomItem extends Model{
  protected $fillable = [
    'transaction_id',
    'description',
    'points'
  ]; 

  public function transaction(){
    return $this->belongsTo('App\Transaction');
  }
}

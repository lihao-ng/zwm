<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuideContent extends Model{
  use SoftDeletes;
  
  protected $fillable = [
    'name',
    'description'
  ]; 

  public function guide(){
    return $this->belongsTo('App\Guide');
  }
}

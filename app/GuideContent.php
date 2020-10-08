<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuideContent extends Model{
  protected $fillable = [
    'name',
    'description'
  ]; 

  public function guide(){
    return $this->belongsTo('App\Guide');
  }
}

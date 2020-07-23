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
}

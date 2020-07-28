<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'role_id',
    'first_name', 
    'last_name',
    'email',
    'gender', 
    'password'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 
    'remember_token'
  ];

  public function customer(){
    return $this->hasOne('App\Customer');
  }

  public function merchant(){
    return $this->hasOne('App\Merchant');
  }

  public function isAdmin(){
    return $this->role_id === 1;
  }

  public function isMerchant(){
    return $this->role_id === 2;
  }
}

<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
  use HasApiTokens, Notifiable, SoftDeletes;

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

  public function role(){
    return $this->belongsTo('App\Role');
  }

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

  public function tokens(){
		return $this->hasMany('App\VerificationToken');
  }
  
  public static function boot() {
    parent::boot();

    static::deleting(function($user) { 
      if($user->customer) {
        $user->customer()->delete();
      }else if($user->isMerchant) {
        $user->merchant()->delete();
      }else {
        $user->admin()->delete();
      }
    });
  }
}

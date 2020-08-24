<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthRefreshToken extends Model{
  protected $table = 'oauth_refresh_tokens';

  public $timestamps = false;

  // protected $fillable = [
  //   'revoked'
  // ];

  protected $dates = [
    'expires_at',
];
}

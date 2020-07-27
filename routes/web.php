<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes for Admin

Route::prefix('admin')->name('admin.')->group(function(){
  Route::middleware('guest')->group(function(){
  	Route::get('login', 'Admin\AuthController@showLogin')->name('login.show');
  	Route::post('login', 'Admin\AuthController@login')->name('login.post');
    Route::get('/', 'Admin\AuthController@showLogin');
  });

  Route::middleware('auth')->group(function(){
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    // Route::get('profile', 'Admin\ProfileController@profile')->name('admin.profile');
    // Route::post('profile', 'Admin\ProfileController@update')->name('admin.profile.update');
  	// Route::put('profile', 'Admin\ProfileController@changePassword')->name('admin.profile.password');

    Route::get('logout', 'Admin\AuthController@logout')->name('logout');

    // Route::post('players/{player}', 'Admin\PlayersController@update')->name('admin.player.update');
    // Route::post('players/verification/{player}', 'Admin\PlayersController@verifyPlayer')->name('admin.players.verification.verify');
    // Route::delete('players/verification/{player}', 'Admin\PlayersController@destroy')->name('admin.players.verification.destroy');
    // Route::get('players/verification', 'Admin\PlayersController@getToVerify')->name('admin.players.verification');
    Route::resource('merchants', 'Admin\MerchantsController');

    // Route::get('teams/search', 'Admin\TeamsController@search')->name('admin.team.search');
    // Route::post('teams/{team}', 'Admin\TeamsController@update')->name('admin.team.update');
    // Route::resource('teams', 'Admin\TeamsController', ['as' => 'admin']);

    // Route::resource('regions', 'Admin\RegionsController', ['as' => 'admin']);

    // Route::resource('leagues', 'Admin\LeaguesController', ['as' => 'admin']);

    // Route::post('statistics/{statistic}', 'Admin\StatisticsController@update')->name('admin.statistic.update');
    // Route::resource('statistics', 'Admin\StatisticsController', ['as' => 'admin']);
  });
});



// Routes for Merchants

// Route::get('profile/{player}', 'Client\PlayersController@getProfile')->name('player.profile');
Route::middleware('guest')->group(function(){
  Route::get('login', 'Client\AuthController@showLogin')->name('login.show');
  Route::post('login', 'Client\AuthController@login')->name('login');
  Route::get('/', 'Client\AuthController@showLogin');

  Route::get('register', 'Client\AuthController@showRegister')->name('register.show');
  Route::post('register', 'Client\AuthController@register')->name('register');
});
// Route::get('forgotpassword', 'Client\AuthController@forgotPassword')->name('forgot-pw');
// Route::post('forgotpassword/token', 'Client\AuthController@passwordToken')->name('pw-store');
// Route::get('resetpassword/{verficationToken}', 'Client\AuthController@resetPassword')->name('reset-pw');
// Route::put('resetpassword/{id}/edit', 'Client\AuthController@reset')->name('reset');

Route::middleware('auth')->group(function(){
  Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');

  Route::get('logout', 'Client\AuthController@logout')->name('logout');
});

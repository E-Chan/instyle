<?php


  /*----------*/
 /*---Home---*/
/*----------*/
Route::get('', [
    'uses'  => '\Instyle\Http\Controllers\HomeController@index',
    'as'    => 'home'
    ]);

Route::get('/alert', function() {
    return redirect()->route('home')->with('info', 'Cuenta registrada!')    ;
});

  /*----------*/
 /*---Auth---*/
/*----------*/
Route::get('/signup',[
    'uses'  => '\Instyle\Http\Controllers\AuthController@getSignup',
    'as'    => 'auth.signup',
    'middleware' => ['guest']
    ]);

Route::post('/signup',[
    'uses'  => '\Instyle\Http\Controllers\AuthController@postSignup',
    'middleware' => ['guest']
    ]);

Route::get('/signin',[
    'uses'  => '\Instyle\Http\Controllers\AuthController@getSignin',
    'as'    => 'auth.signin',
    'middleware' => ['guest']
    ]);

Route::post('/signin',[
    'uses'  => '\Instyle\Http\Controllers\AuthController@postSignin',
    'middleware' => ['guest']
    ]);

Route::get('/signout',[
    'uses'  => '\Instyle\Http\Controllers\AuthController@getSignout',
    'as'    => 'auth.signout'
    ]);



  /*----------*/
 /*--Search--*/
/*----------*/

Route::get('/search',[
    'uses'=> '\Instyle\Http\Controllers\SearchController@getResults',
    'as' => 'search.results',
    ]);

  /*---------------*/
 /*--Userprofile--*/
/*---------------*/

Route::get('/user/{username}', [
    'uses'=> '\Instyle\Http\Controllers\ProfileController@getProfile',
    'as' => 'profile.index',
    ]);
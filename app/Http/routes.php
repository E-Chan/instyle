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
    'as'    => 'auth.signup'
    ]);

Route::post('/signup',[
    'uses'  => '\Instyle\Http\Controllers\AuthController@postSignup',
    ]);

Route::get('/signin',[
    'uses'  => '\Instyle\Http\Controllers\AuthController@getSignin',
    'as'    => 'auth.signin'
    ]);

Route::post('/signin',[
    'uses'  => '\Instyle\Http\Controllers\AuthController@postSignin',
    ]);

Route::get('/signout',[
    'uses'  => '\Instyle\Http\Controllers\AuthController@getSignout',
    'as'    => 'auth.signout'
    ]);
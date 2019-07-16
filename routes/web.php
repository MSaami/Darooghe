<?php

use Illuminate\Http\Request;


Route::get('/', function (Request $request) {
	// App\Role::find(1)->givePermissionsTo('delete users');
	$request->user()->giveRolesTo('admin' , 'user');
	// dump($request->user()->hasRole('user'));
	// dump($request->user()->refreshPermissions(['delete users']));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

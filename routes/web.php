<?php
use Illuminate\Http\Request;
Route::get('/', function (Request $request) {
return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'panel' ] , function(){
	Route::group(['prefix' => 'users' ] , function(){
		Route::get('/' , 'UsersController@index')->name('users.index');
		Route::get('{user}/edit' ,'UsersController@edit')->name('users.edit');
		Route::post('{user}/edit' , 'UsersController@update')->name('users.update');
	});
	Route::get('roles' , 'RolesController@index')->name('roles.index');
	Route::post('roles' , 'RolesController@store')->name('roles.store');
	Route::get('roles/{role}/edit' , 'RolesController@edit')->name('roles.edit');
	Route::post('roles/{role}/edit' , 'RolesController@update')->name('roles.update');
	Route::get('permissions' , 'PermissionsController@index')->name('permissions.index');
	Route::get('permissions/{permission}/edit' , 'PermissionsController@edit')->name('permissions.edit');
	Route::post('permissions' , 'PermissionsController@store')->name('permissions.store');
	Route::post('permissions/{permission}/edit' , 'PermissionsController@update')->name('permission.update');
});
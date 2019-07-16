<?php 

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function () {

	Config::set('auth.defines','admin');
	Route::get('login','AdminAuth@login');
	Route::post('login','AdminAuth@dologin');
	Route::get('forgot/password','AdminAuth@forgot_password');
	Route::post('forgot/password','AdminAuth@forgot_password_post');
	Route::get('reset/password/{token}','AdminAuth@reset_password');
	Route::post('reset/password/{token}','AdminAuth@reset_password_final');
	
	Route::group(['middleware' => 'admin:admin'], function () {


		Route::resource('admins', 'AdminController');
		Route::delete('admins/destroy/all','AdminController@multidelete');

		Route::resource('users', 'UsersController');
		Route::delete('users/destroy/all','UsersController@multidelete');

		Route::resource('departments', 'DepartmentsController');
		 //user routes
        Route::resource('offers', 'OffersController')->except(['show']);
        //user adds
        Route::resource('adds', 'AddsController', [
   			 'only' => ['index','show','update','destroy']
			]);

		Route::get('/', function () {
			return view('admin.home');
		});

		Route::get('settings','Settings@setting');
		Route::post('settings','Settings@setting_save');

		Route::any('logout','AdminAuth@logout');
	});

	Route::get('lang/{lang}', function($lang) {

		session()->has('lang')? session()->forget('lang') : '';
		

		if($lang ==  "ar")
		{
			session()->put('lang','ar');
		} else {
			
			session()->put('lang','en');
		}

		return back();

	});




});
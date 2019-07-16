<?php

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

Auth::routes();


Route::group(['middleware'=>'Maintenance'], function() {

Route::get('/', 'HomeController@index');
Route::get('offers/{id}', 'HomeController@show');
Route::get('category/{id}', 'Front\CategoryController@index');

Route::resource('profile', 'Front\ProfileController', [
    'only' => ['index', 'edit','update']
]);

//product routes
 Route::resource('adds', 'Front\AddsController');

});

Route::get('maintenance', function () {
	if(setting()->status == 'open')
        {
            return redirect('/');
        }
    return view('style.maintenance');
});




 View::composer(['*'], function($view)
    {
    	$deps = App\Model\Department::with('children')->get();
        $view->with('deps', $deps);
    });

 Route::get('activate', function() {
 Artisan::call('storage:link');
});

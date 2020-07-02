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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('manages', ['as' => 'pages.manages', 'uses' => 'PageController@manages'])->middleware('can:product.create');
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps'])->middleware('can:product.create');
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications'])->middleware('can:product.create');
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl'])->middleware('can:product.create');
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables'])->middleware('can:product.create');
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography'])->middleware('can:product.create');
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade'])->middleware('can:product.create');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('/products', 'ProductsController@index')->name('home');
Route::group(['prefix' => 'products'], function () {
    // Route::get('/drafts', 'ProductsController@drafts')
    //     ->name('list_drafts')
    //     ->middleware('auth');
    Route::get('/export', 'ProductsController@export')
        ->name('export_product')
        ->middleware('can:product.create');
    Route::get('/show/{id}', 'ProductsController@show')
        ->name('show_product');
    Route::get('/create', 'ProductsController@create')
        ->name('create_product')
        ->middleware('can:product.create');
    Route::post('/create', 'ProductsController@store')
        ->name('store_product')
        ->middleware('can:product.create');
    Route::get('/edit/{product}', 'ProductsController@edit')
        ->name('edit_product')
        ->middleware('can:product.update,product');
    Route::post('/edit/{product}', 'ProductsController@update')
        ->name('update_product')
        ->middleware('can:product.update,product');
    Route::get('/publish/{product}', 'ProductsController@publish')
        ->name('publish_product')
        ->middleware('can:product.publish');
    Route::post('/destroy/{product}', 'ProductsController@destroy')
        ->name('destroy_product')
        ->middleware('can:product.create');
    Route::get('/destroy/{product}', 'ProductsController@destroy')
        ->name('destroy_product')
        ->middleware('can:product.create');
});

Route::resource('usermanage','UserManageController')->middleware('can:product.create');
Route::group(['prefix' => 'usermanage'], function () {
    Route::get('/edit/{user}', 'UserManageController@edit')
        ->name('edit_user')
        ->middleware('can:product.create');
    Route::post('/edit/{user}', 'UserManageController@update')
        ->name('update_user')
        ->middleware('can:product.create');
});


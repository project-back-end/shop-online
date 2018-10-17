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

Route::get('/','HomeController@index')->name('home');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('feedback',function (){
   return view('pages.feedback');
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function (){
// Users
//    Route::resource('user','UserController');
    Route::get('users','UserController@index')->name('users');
    Route::post('users','UserController@store')->name('users.store');
    Route::get('users/create','UserController@create')->name('users.create');
    Route::get('users/view/{id}','UserController@show')->name('users.view');
    Route::get('users/edit/{id}','UserController@edit')->name('users.edit');
    Route::patch('users/update/{id}','UserController@update')->name('users.update');
    Route::DELETE('users/delete/{id}','UserController@destroy')->name('users.destroy');
// Roles
    Route::get('roles','RoleController@index')->name('roles');
    Route::post('roles','RoleController@store')->name('roles.store');
    Route::get('roles/create','RoleController@create')->name('roles.create');
    Route::get('roles/show/{id}','RoleController@show')->name('roles.show');
    Route::get('roles/edit/{id}','RoleController@edit')->name('roles.edit');
    Route::patch('roles/update/{id}','RoleController@update')->name('roles.update');
    Route::DELETE('roles/delete/{id}','RoleController@destroy')->name('roles.destroy');
// Categories
    Route::get('categories','CategoriesController@index')->name('categories');
    Route::post('categories','CategoriesController@store')->name('categories.store');
//    Route::get('categories/create','CategoriesController@create')->name('categories.create');
    Route::get('categories/show/{id}','CategoriesController@show')->name('categories.show');
    Route::get('categories/edit/{id}','CategoriesController@edit')->name('categories.edit');
    Route::patch('categories/update/{id}','CategoriesController@update')->name('categories.update');
    Route::DELETE('categories/delete/{id}','CategoriesController@destroy')->name('categories.destroy');
    Route::delete('categories/deleteAll', 'CategoriesController@deleteAll')->name('categories.deleteAll');
// Stores
    Route::get('stores','StoreController@index')->name('stores');
    Route::post('stores','StoreController@store')->name('stores.store');
//    Route::get('stores/create','StoreController@create')->name('stores.create');
    Route::get('stores/show/{id}','StoreController@show')->name('stores.show');
    Route::get('stores/edit/{id}','StoreController@edit')->name('stores.edit');
    Route::patch('stores/update/{id}','StoreController@update')->name('stores.update');
    Route::DELETE('stores/delete/{id}','StoreController@destroy')->name('stores.destroy');
    Route::delete('stores/deleteAll', 'StoreController@deleteAll')->name('stores.deleteAll');
// Products
    Route::get('products','ProductController@index')->name('products');
    Route::post('products','ProductController@store')->name('products.store');
    Route::get('products/create','ProductController@create')->name('products.create');
    Route::get('products/view/{id}','ProductController@show')->name('products.show');
    Route::get('products/edit/{id}','ProductController@edit')->name('products.edit');
    Route::patch('products/update/{id}','ProductController@update')->name('products.update');
    Route::DELETE('products/delete/{id}','ProductController@destroy')->name('products.destroy');
});

//facebook socialite
    Route::get('login/facebook',['as' => 'login.facebook','uses' => 'Auth\LoginController@redirectToProvider']);
    Route::get('login/facebook/callback',['as' =>'login/facebook/callback','uses' =>  'Auth\LoginController@handleProviderCallback']);

//login with google
    Route::get('login/google',['as' => 'login.google','uses' => 'Auth\LoginController@redirectToProviderGoogle']);
    Route::get('login/google/callback',['as' =>'login/google/callback','uses' =>  'Auth\LoginController@handleProviderCallbackGoogle']);

//feedback
    Route::get('feedback','FeedbackController@index')->name('index');
    Route::post('feedback','FeedbackController@store')->name('store');
//    Test
    Route::get('/test',function (){
        return view('test');
    });

//adduser and page
    Route::get('/adduser','AddNewUserController@index');

    Route::get('/addpage',function (){
        return view('addpage');

    });
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

Route::get('/', function () {
    //return view('user/login');
    return redirect('login');
});
Route::get('/user/blocked', function () {
    return view('user.blocked');
});
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => ['auth','block']], function() {
    /*Route::get('/', function () {
        return view('user.blocked');
    });*/
    Route::resource('dashboard', 'Admin\DashboardController', ['except' => [
        'create','store','update','destroy','show','edit'
    ]]);
    Route::resource('users', 'Admin\UserController', ['except' => [
        'show'
    ]]);
    Route::resource('books', 'Admin\BookController', ['except' => [
        'show'
    ]]);
    Route::get('/users/block/{id}', 'Admin\UserController@block')->name('blockUser');
    Route::post('/users/block', 'Admin\UserController@block')->name('blockUserFacade');
    Route::resource('book-image', 'Admin\BookImageController', ['except' => [
        'show'
    ]]);
    Route::resource('book-type', 'Admin\BookTypeController', ['except' => [
        'show'
    ]]);
    Route::resource('customers', 'Admin\CustomerController');
    Route::resource('sales', 'Admin\SaleController', ['except' => [
        'create','store','show','edit','update'
    ]]);
    Route::resource('accounts', 'Admin\AccountController', ['except' => [
        'create','store','show','edit','update','destroy'
    ]]);
    Route::resource('news', 'Admin\NewsController', ['except' => [
        'show','edit','update'
    ]]);
    Route::resource('inflows', 'Admin\InflowController', ['except' => [
        'create','store','show','edit','destroy'
    ]]);
    Route::post('/settings', 'Admin\UserController@changeSystemSettings')->name('system_settings');
});
Route::get('/book/{id}', 'Admin\UserController@show')->name('book_profile');
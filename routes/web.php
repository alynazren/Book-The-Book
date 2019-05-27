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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// show the form to open a new BookSell
// create() return a view file bookSell.create 
Route::get('new_bookSell', 'BookSellsController@create');

// store() on BookSellsController which will do the actual storing of the ticket in the database
Route::post('new_bookSell', 'BookSellsController@store');

// display all the books posted by user
Route::get('my_bookSell', 'BookSellsController@userBookSell');

// user to be able to access a particular book 
Route::get('bookSell/{bookSell_id}', 'BookSellsController@show');

// display all the books posted by all user
Route::get('all_bookSell', 'BookBuyController@allBookSell');

// display profile user
Route::get('profile/{user_id}', 'UserProfileController@showProfile');

// display order page
Route::get('order_book/{user_id}','BookOrdersController@orderBuku');

// buyer place order
Route::post('/order/{bid}','BookOrdersController@newOrder');

// approve
Route::get('/approve/{oid}','BookOrdersController@approveOrder');


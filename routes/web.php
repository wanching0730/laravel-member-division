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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DivisionController@index')->name('/');

Route::get('/home', 'DivisionController@index')->name('home');

Route::get('/division/create', 'DivisionController@create')->name('division.create');
Route::post('/division/store', 'DivisionController@store')->name('division.store');
Route::get('/division', 'DivisionController@index')->name('division.index');
Route::get('/division/{id}', 'DivisionController@show')->name('division.show');
Route::get('/division/edit/{id}', 'DivisionController@edit')->name('division.edit');
Route::post('/division/update/{id}', 'DivisionController@update')->name('division.update');
Route::delete('division/{id}', 'DivisionController@destroy')->name('division.destroy');

// Route::resource('member', 'MemberController');
Route::get('/member/create', 'MemberController@create')->name('member.create');
Route::post('/member/store', 'MemberController@store')->name('member.store');
Route::get('/member', 'MemberController@index')->name('member.index');
Route::get('/member/{id}', 'MemberController@show')->name('member.show');
Route::get('/member/edit/{id}', 'MemberController@edit')->name('member.edit');
Route::post('/member/update/{id}', 'MemberController@update')->name('member.update');
Route::delete('member/{id}', 'MemberController@destroy')->name('member.destroy');
Route::get('member/{id}/image', 'MemberController@image');

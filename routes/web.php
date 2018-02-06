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

// bonus
Route::get('/bonus/index', 'BonusController@index')->name('bonus/index');
// desa
Route::get('/desa/autoComplete', 'DesaController@autoComplete')->name('desa/autoComplete');
// daily bonus
Route::get('/dailyBonus/{stat}/index', 'DailyBonusController@index')->name('dailyBonus/index');
// package
Route::get('/package/index', 'PackageController@index')->name('package/index');
// pin
Route::get('/pin/{stat}/index', 'PinController@index')->name('pin/index');
Route::post('/pin/generate', 'PinController@generate')->name('pin/generate');
// member pin
Route::post('/memberPin/store', 'MemberPinController@store')->name('memberPin/store');
// member
Route::get('/member/create', 'MemberController@create')->name('member/create');
Route::post('/member/store', 'MemberController@store')->name('member/store');
Route::get('/member/index', 'MemberController@index')->name('member/index');

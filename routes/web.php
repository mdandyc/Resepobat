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

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/obat/search','ObatController@search');
Route::resource('obat', 'ObatController');
Route::get('/pasien/search','PasienController@search');
Route::resource('pasien', 'PasienController');
Route::get('/poliklinik/search','PoliklinikController@search');
Route::resource('poliklinik', 'PoliklinikController');
Route::get('/pembayaran/search','PembayaranController@search');
Route::resource('pembayaran', 'PembayaranController');
Route::get('/dokter/search','DokterController@search');
Route::resource('dokter', 'DokterController');
Route::get('/resep/search','ResepController@search');
Route::resource('resep', 'ResepController');
Route::get('/detail/search','DetailController@search');
Route::resource('detail', 'DetailController');
Route::get('/pendaftaran/search','PendaftaranController@search');
Route::resource('pendaftaran', 'PendaftaranController');


Route::GET('/','Auth\LoginController@showLoginForm')->name('login');
Route::POST('/','Auth\LoginController@login');
Auth::routes();

Route::get('/home', 'HomeController@index');

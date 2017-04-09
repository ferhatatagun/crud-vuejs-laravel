<?php
/*
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/selam', function () {
    return view('welcome');
});
Route::get('/as', function () {
    return view('welcome');
});
Route::group(['middleware'=> ['web']],function() {
  Route::get('/VueJsCrud','BlogController@VueJsCrud');
  Route::resource('vueitems','BlogController');
});

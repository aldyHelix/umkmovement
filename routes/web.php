<?php
use App\Http\Controllers\IndexController;

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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/','IndexController@index');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/dashboard/pengaturan', 'PengaturanController')->middleware('auth');
Route::resource('/dashboard/berita','BeritaController')->middleware('auth');
Route::resource('/dashboard/portofolio','PortofolioController')->middleware('auth');
Route::resource('dashboard','DashboardController')->middleware('auth');

Route::post('/kirim','IndexController@kirimPesan');

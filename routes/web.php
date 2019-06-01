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
Route::get('/dashboard/pengaturan', 'PengaturanController@index')->middleware('auth');
Route::resource('/dashboard/berita','BeritaController')->middleware('auth');
Route::resource('/dashboard/portofolio','PortofolioController')->middleware('auth');
Route::resource('dashboard','DashboardController')->middleware('auth');

Route::post('/kirim','IndexController@kirimPesan');
Route::post('/dashboard/pengaturan/upload', 'PengaturanController@partnerUpload')->name('upload.image');
Route::delete('/dashboard/pengaturan/partnerdelete', 'PengaturanController@partnerDestroy')->name('partner.delete');
Route::post('/dashboard/pengaturan/tentangupdate', 'PengaturanController@updateTentang')->name('tentang.update');
Route::post('/dashboard/pengaturan/kontakcreate', 'PengaturanController@createKontak')->name('kontak.create');
Route::post('/dashboard/pengaturan/kontakupdate', 'PengaturanController@updateKontak')->name('kontak.update');
Route::delete('/dashboard/pengaturan/kontakdelete', 'PengaturanController@destroyKontak')->name('kontak.delete');

Route::post('/dashboard/pengaturan/changepassword', 'PengaturanController@ubahPassword')->name('password.update');

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
Route::delete('dashboard/pesan/delete', 'DashboardController@destroy')->name('pesan.delete');
//berita route crud
Route::get('/dashboard/berita','BeritaController@index')->middleware('auth');
Route::post('/dashboard/berita/store', 'BeritaController@store')->name('berita.store');
Route::post('/dashboard/berita/update', 'BeritaController@update')->name('berita.update');
Route::delete('/dashboard/berita/delete', 'BeritaController@destroy')->name('berita.destroy');
//portofolio route CRUD
    Route::get('/dashboard/portofolio','PortofolioController@index')->middleware('auth');
    Route::post('/dashboard/portofolio/store', 'PortofolioController@store')->name('portofolio.store');
    Route::post('/dashboard/portofolio/update', 'PortofolioController@update')->name('portofolio.update');
    Route::delete('/dashboard/portofolio/delete', 'PortofolioController@destroy')->name('portofolio.destroy');
//service route crud
Route::get('/dashboard/service', 'ServiceController@index')->middleware('auth');
Route::get( '/dashboard/service/show', 'ServiceController@show');
Route::post('/dashboard/service/store', 'ServiceController@store')->name('service.store');
Route::post('/dashboard/service/update', 'ServiceController@update')->name('service.update');
Route::delete('/dashboard/service/delete', 'ServiceController@destroy')->name('service.destroy');

Route::resource('dashboard','DashboardController')->middleware('auth');

Route::post('/kirim','IndexController@kirimPesan');
Route::post('/dashboard/pengaturan/upload', 'PengaturanController@partnerUpload')->name('upload.image');
Route::delete('/dashboard/pengaturan/partnerdelete', 'PengaturanController@partnerDestroy')->name('partner.delete');
Route::post('/dashboard/pengaturan/tentangupdate', 'PengaturanController@updateTentang')->name('tentang.update');
Route::post('/dashboard/pengaturan/kontakcreate', 'PengaturanController@createKontak')->name('kontak.create');
Route::post('/dashboard/pengaturan/kontakupdate', 'PengaturanController@updateKontak')->name('kontak.update');
Route::delete('/dashboard/pengaturan/kontakdelete', 'PengaturanController@destroyKontak')->name('kontak.delete');

Route::post('/dashboard/pengaturan/changepassword', 'PengaturanController@ubahPassword')->name('password.update');

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

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

// Anyone Can Access
Route::get('/', 'HomeController@index')->name('home');
Route::get('/lembur', 'LemburController@ViewData')->name('lembur');
Route::get('/profil', 'ProfilController@ViewData')->name('profil');
Route::get('/profil_edit', 'ProfilController@EditData')->name('profil2');
Route::post('/profil/edit/{id}', 'ProfilController@EditDataProfil')->name('profil_update');
Route::get('/lembur/delete/{id}', 'LemburController@DeleteData')->name('lembur_delete');
Route::get('/lembur_edit/{id}', 'LemburController@EditData')->name('lembur3');
Route::put('/lembur/edit/{id}', 'LemburController@UpdateData')->name('lembur_update');

//Super Admin Only
Route::group(['middleware' => 'App\Http\Middleware\SuperAdminMiddleware'], function() {
    Route::get('/user', 'UserController@ViewData')->name('user');
    Route::get('/user_input', 'UserController@InputData')->name('user2');
    Route::post('/user/save', 'UserController@SaveData')->name('user_save');
    Route::get('/user/delete/{id}', 'UserController@DeleteData')->name('user_delete');
});

//Admin Only
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::get('/karyawan', 'KaryawanController@ViewData')->name('karyawan');
    Route::get('/karyawan_input', 'KaryawanController@InputData')->name('karyawan2');
    Route::get('/karyawan_edit/{id}', 'KaryawanController@EditData')->name('karyawan3');
    Route::put('/karyawan/edit/{id}', 'KaryawanController@UpdateData')->name('karyawan_update');
    Route::post('/karyawan/save', 'KaryawanController@SaveData')->name('karyawan_save');
    Route::get('/karyawan/delete/{id}', 'KaryawanController@DeleteData')->name('karyawan_delete');
    Route::get('/lembur/konfirmasi/{id}', 'LemburController@KonfirmasiData')->name('lembur_konfirmasi');
    Route::get('/golongan', 'GolonganController@ViewData')->name('golongan');
    Route::get('/golongan_input', 'GolonganController@InputData')->name('golongan2');
    Route::post('/golongan/save', 'GolonganController@SaveData')->name('golongan_save');
    Route::get('/golongan/delete/{id}', 'GolonganController@DeleteData')->name('golongan_delete');
    Route::get('/golongan_edit/{id}', 'GolonganController@EditData')->name('golongan3');
    Route::put('/golongan/edit/{id}', 'GolonganController@UpdateData')->name('golongan_update');
    Route::get('/divisi', 'DivisiController@ViewData')->name('divisi');
    Route::get('/divisi_input', 'DivisiController@InputData')->name('divisi2');
    Route::post('/divisi/save', 'DivisiController@SaveData')->name('divisi_save');
    Route::get('/divisi/delete/{id}', 'DivisiController@DeleteData')->name('divisi_delete');
    Route::get('/divisi_edit/{id}', 'DivisiController@EditData')->name('divisi3');
    Route::put('/divisi/edit/{id}', 'DivisiController@UpdateData')->name('divisi_update');
});

//Karyawan Only
Route::group(['middleware' => 'App\Http\Middleware\KaryawanMiddleware'], function()
{
    Route::get('/lembur_input', 'LemburController@InputData')->name('lembur2');
    Route::post('/lembur/save', 'LemburController@SaveData')->name('lembur_save');
});


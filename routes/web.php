<?php

use Illuminate\Support\Facades\Route;



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

$controller_path = 'App\Http\Controllers';

// Main Page
Route::get('/', $controller_path . '\dashboard\Data@index')->name('dashboard-data')->middleware(['auth']);
Route::get('download/{file}', $controller_path . '\dashboard\Data@download')->name('download');
Route::get('data/delete/{id}', $controller_path . '\dashboard\Data@delete')->name('delete');
Route::get('/shows/{file}', $controller_path . '\dashboard\Data@showFile')->name('showFile')->middleware(['auth']);
Route::get('/search', $controller_path . '\dashboard\Data@search')->name('search.route')->middleware(['auth']);


// User
Route::get('/persetujuan', $controller_path . '\SignColumn\SignColumn@index')->name('sign')->middleware(['auth']);
Route::post('/persetujuan', $controller_path . '\SignColumn\SignColumn@store')->name('store')->middleware(['auth']);

// pages
Route::get('/akun-profil', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account')->middleware(['auth']);
Route::get('/pages/edit-profile', $controller_path . '\pages\AccountSettingsAccount@edit')->name('edit')->middleware(['auth']);
Route::post('/pages/edit-profile', $controller_path . '\pages\AccountSettingsAccount@store')->name('store')->middleware(['auth']);
Route::get('/pages/reset-password', $controller_path . '\pages\AccountSettingsAccount@showResetPasswordForm')->name('showResetPasswordForm')->middleware(['auth']);
Route::post('/pages/reset-password', $controller_path . '\pages\AccountSettingsAccount@resetPassword')->name('resetPassword')->middleware(['auth']);
Route::get('/pages/tanda-tangan', $controller_path . '\pages\AccountSettingsAccount@tandaTangan')->name('tandaTangan')->middleware(['auth']);
Route::post('/pages/tanda-tangan', $controller_path . '\pages\AccountSettingsAccount@storetandatangan')->name('storetandatangan')->middleware(['auth']);
//Route::get('/pages/reset-photo', $controller_path . '\pages\AccountSettingsAccount@resetPhoto');
//Route::post('/pages/reset-photo', $controller_path . '\pages\AccountSettingsAccount@resetPhoto');




// authentication
Route::get('/login', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::post('/login', $controller_path . '\authentications\LoginBasic@authenticate');
Route::match(['get', 'post'], '/keluar', $controller_path . '\authentications\LoginBasic@logout')->name('logout');
//Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
//Route::post('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@store')->name('auth-register-basic');

//forms konven cessie
Route::get('/select_konven_cessie', $controller_path . '\form_cessie\SelectFormsKonven@index')->name('index');
Route::get('/select_konven_cessie_sebelum', $controller_path . '\form_cessie\InputKonvenCessieSebelum@index')->name('index');
Route::post('/select_konven_cessie_sebelum', $controller_path . '\form_cessie\InputKonvenCessieSebelum@store');
Route::get('/select_konven_cessie_setelah', $controller_path . '\form_cessie\InputKonvenCessieSetelah@index');





//FORMS
//select forms
Route::get('/buat_internal_memo', $controller_path . '\form_elements\SelectForms@index')->name('index')->middleware(['auth']);
Route::get('/edit_internal_memo/{id}', $controller_path . '\form_elements\FormInputTemplate@edit')->name('edit')->middleware(['auth']);
Route::post('/edit_internal_memo/{id}', $controller_path . '\form_elements\FormInputTemplate@updateData')->name('update')->middleware(['auth']);

// forms template
Route::get('/form-data', $controller_path . '\form_elements\FormInputTemplate@index')->name('index')->middleware(['auth']);
Route::post('/form-data', $controller_path . '\form_elements\FormInputTemplate@store')->name('store')->middleware(['auth']);
Route::get('/print', $controller_path . '\form_elements\FormInputTemplate@print')->name('print')->middleware(['auth']);
Route::get('/print2', $controller_path . '\form_elements\FormInputTemplate@print2')->name('print2')->middleware(['auth']);
Route::get('/printdata/{id}', $controller_path . '\form_elements\FormInputTemplate@printdata')->name('printdata')->middleware(['auth']);
Route::get('/printdata2/{id}', $controller_path . '\form_elements\FormInputTemplate@printdata2')->name('printdata2')->middleware(['auth']);
Route::get('/tanda-tangan', $controller_path . '\form_elements\FormInputTemplate@edit')->name('edit')->middleware(['auth']);


// form send data
Route::get('/kirim-data', $controller_path . '\form_layouts\FormSendData@index')->name('index')->middleware(['auth']);
Route::get('/kirim-data', $controller_path . '\form_layouts\FormSendData@create')->name('create')->middleware(['auth']);
Route::post('/kirim-data', $controller_path . '\form_layouts\FormSendData@store')->name('store')->middleware(['auth']);

//SUPER ADMIN
// data user
Route::get('/data-pengguna', $controller_path . '\data\DataUser@index')->name('index');
Route::get('/detail/{id}', $controller_path . '\data\DataUser@detail')->name('detail')->middleware(['auth', 'master']);
Route::get('datauser/delete/{id}', $controller_path . '\data\DataUser@delete')->name('delete')->middleware(['auth', 'master']);
//add user
Route::get('/tambah-pengguna', $controller_path . '\AddUser\AddUser@index')->name('index');
Route::post('/tambah-pengguna', $controller_path . '\AddUser\AddUser@store')->name('store');


//Forgot Password
Route::get('/forgot-password', $controller_path . '\authentications\ForgotPassword@forgot')->name('forgot');
Route::post('/forgot-password', $controller_path . '\authentications\ForgotPassword@forgot_password')->name('forgot_password');
Route::get('/reset/{token}', $controller_path . '\authentications\ForgotPassword@reset')->name('reset');
Route::post('/reset/{token}', $controller_path . '\authentications\ForgotPassword@reset_token')->name('reset_token');

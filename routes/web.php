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

Route::get('/', 'UserController@indexPage')->name('user.index');

// Auth::routes();

Route::get('/login', 'UserController@loginPage')->name('user.loginPage');
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::get('/register', 'UserController@registerPage')->name('user.registerPage');
Route::post('/login', 'UserController@login')->name('user.login');
Route::post('/register', 'UserController@register')->name('user.register');
Route::get('/sukses-register', 'UserController@registerSuccess')->name('user.registerSuccess');

Route::get('/dashboard', 'UserController@dashboardPage')->name('user.dashboard')->middleware('User');
Route::get('/kelas-saya', 'UserController@listKelas')->name('user.listKelas');

Route::group(['prefix' => 'pengajar'], function() {
    Route::get('/dasbor', 'UserController@dashboard')->name('pengajar.dashboard')->middleware('User');
    
    Route::get('/kelas', 'UserController@kelas')->name('pengajar.kelas')->middleware('User');
    Route::get('/kelas/buat', 'UserController@createClass')->name('pengajar.createClass')->middleware('User');
    Route::post('/kelas/buat', 'ClassController@store')->name('kelas.create')->middleware('User');
    Route::patch('/kelas/{id}/update', 'ClassController@update')->name('kelas.update')->middleware('User');
    Route::get('/kelas/{id}/materi', 'UserController@manageMaterial')->name('kelas.material')->middleware('User');
    Route::get('/kelas/{id}/settings', 'UserController@classSettings')->name('kelas.settings')->middleware('User');
    Route::get('/kelas/{id}/peserta', 'UserController@classParticipant')->name('kelas.peserta')->middleware('User');

    Route::get('/kelas/{id}/tambah-materi', 'UserController@uploadMaterialPage')->name('material.upload')->middleware('User');
    Route::post('/kelas/{id}/store-materi', 'MaterialController@store')->name('material.store')->middleware('User');
    Route::get('/kelas/{id}/delete-materi', 'MaterialController@delete')->name('material.delete')->middleware('User');
    
    Route::get('/pendapatan', 'UserController@earning')->name('pengajar.earning')->middleware('User');
});


<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::middleware(['jwt.verify'])->group(function(){
    //siswa
    

    //pelanggaran
    

    //point
    
});

Route::get('point_siswa', 'PointSiswaController@index');
    Route::get('point_siswa/{id}', 'PointSiswaController@show');
    // id yang digunakan : id point
    Route::get('point_siswa/siswa/{id}', 'PointSiswaController@detail');
    // id yang diguunakan : id siswa yg ada di point siswa 
    Route::post('point_siswa', 'PointSiswaController@store');
    // mengguanakan id_siswa yg ada di siswanya dan id_pelanggaran yg ada di pelanggarannya 
    Route::post('point_siswa/{id}', 'PointSiswaController@update');
    // id yang digunakan : id point 
    Route::delete('point_siswa/{id}', 'PointSiswaController@destroy');


    Route::get('/siswa', 'SiswaController@index');
    Route::get('/siswa/{id}', 'SiswaController@show');
    Route::post('/siswa', 'SiswaController@store');
    Route::put('/siswa/{id}', 'SiswaController@update');
    Route::delete('/siswa/{id}', 'SiswaController@destroy');


    Route::get('/pelanggaran', 'PelanggaranController@index');
    Route::get('/pelanggaran/{id}', 'PelanggaranController@show');
    Route::post('/pelanggaran', 'PelanggaranController@store');
    Route::put('/pelanggaran/{id}', 'PelanggaranController@update');
    Route::delete('/pelanggaran/{id}', 'PelanggaranController@destroy');

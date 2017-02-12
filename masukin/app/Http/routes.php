<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');    
    Route::get('/home', 'HomeController@index');
    Route::get('/informasi', 'informasiController@index');
    Route::get('/informasi/tambah', 'informasiController@tambah');
    Route::get('/informasi/{id}', 'informasiController@detail');
    Route::get('/informasi/edit/{id}', 'informasiController@edit');
    Route::get('/informasi/delete/{id}', 'informasiController@delete');
    Route::post('/informasi/post','informasiController@post');
    Route::post('/informasi/update','informasiController@update');

    Route::get('/medali', 'medaliController@index');
    Route::get('/medali/{id}', 'medaliController@detail');
    
    Route::get('/cabor', 'caborController@index');
    Route::get('/cabor/edit/{id}', 'caborController@edit');
    //Route::match(array('get', 'post'),'/cabor', 'caborController@index');
    Route::get('/jadwal/tambah', 'jadwalController@add');
    Route::post('/jadwal/post', 'jadwalController@post');
    Route::post('/jadwal/update', 'jadwalController@update');

    Route::post('/cabor/pilih','caborController@pilih');
    Route::get('/cabor/{id}','caborController@cabor');
    Route::get('/cabor/jadwal/edit/{id}','jadwalController@edit');
    Route::get('/cabor/jadwal/delete/{id}','jadwalController@delete');

    Route::get('/cabor/tambah-hasil/{id}','hasilController@add');
    Route::post('/hasil/post','hasilController@post');
    Route::get('/cabor/hasil/edit/{id}','hasilController@edit');
    Route::get('/cabor/hasil/delete/{id}','hasilController@delete');
    Route::post('/hasil/update','hasilController@update');
    Route::get('/hasil','hasilController@index');
    Route::post('/hasil/post-atletik/', 'hasilController@waktu');

    Route::get('/klasemen-group', 'klasemenGroupController@index');
    Route::get('/klasemen-group/add', 'klasemenGroupController@add');
    Route::post('/klasemen-group/pilih', 'klasemenGroupController@pilih');
    Route::get('/klasemen-group/{id}', 'klasemenGroupController@klasemen');
    Route::get('/klasemen-group/edit/{id}', 'klasemenGroupController@edit');
    Route::post('/klasemen-group/update', 'klasemenGroupController@update');
    Route::post('/klasemen-group/post', 'klasemenGroupController@post');
    Route::get('/klasemen-group/delete/{id}', 'klasemenGroupController@delete');
    
    Route::get('/jadwal','jadwalController@index');    
    Route::get('/sejarah', 'SejarahController@index');
    Route::get('/sejarah/{id}', 'SejarahController@pilih');
    Route::get('/sejarah/edit/{id}', 'SejarahController@edit');
    Route::post('/sejarah/update', 'SejarahController@update');

    Route::get('/knockout', 'hasilController@knockout');
    Route::post('/knockout/update', 'hasilController@postKnockout');

    Route::get('/upload-file', 'UploadFileController@index');
    Route::post('/upload-file/post', 'UploadFileController@store');
});



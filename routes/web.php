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

Auth::routes();
Route::resource('notifications', 'NotificationController');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('rsa', 'RSAController');
    Route::resource('process', 'ProcessController', [
        'process' => 'teamId'
    ]);

    Route::get('/team/{teamId}/process/create', 'ProcessController@create')
        ->name('process_create');
    Route::post('/team/{teamId}/process', 'ProcessController@store')
        ->name('process_store');

    Route::get('/', 'ProcessController@overview')
        ->name('team_overview');
    Route::get('/home', 'ProcessController@overview'); //注册完成后自动跳转到这个地址
    Route::get('/team/{teamId}', 'ProcessController@team')
        ->name('team_processes');

    Route::get('/process/start/{id}', 'ProcessController@start');
    Route::get('/process/reload/{id}', 'ProcessController@reload');
    Route::get('/process/restart/{id}', 'ProcessController@restart');
    Route::get('/process/stop/{id}', 'ProcessController@stop');

    Route::get('/process/log/{id}', 'ProcessLogController@log');
    Route::get('/process/log/stdout/{id}', 'ProcessLogController@stdout');
    Route::get('/process/log/stderr/{id}', 'ProcessLogController@stderr');
});
Route::resource('setting', 'SettingController');
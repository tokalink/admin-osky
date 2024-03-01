<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return redirect('admin');
});

// group prefix admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/import-sql', function () {
        $file_dump = '../database/backup.sql';
        // restore the database from file_dump excecute the command
        $run = DB::unprepared(file_get_contents($file_dump));
    });
    
    // migrate
    Route::get('/migrate', function () {
        Artisan::call('migrate');
        return 'migrate';
    });    
});


<?php

use Illuminate\Support\Facades\Artisan;
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


Route::get('/storage', function () {
    Artisan::call('storage:link');
});

Route::get('/copy', function () {
    //copy public_path('uploads') from storage_path('app/uploads'),
    $source = storage_path('app/uploads');
    $destination = public_path('uploads');
    $files = \File::allFiles($source);
    foreach ($files as $file) {
        \File::copy($file, $destination . DIRECTORY_SEPARATOR . $file->getFilename());
    }
    return 'Copy success';
});
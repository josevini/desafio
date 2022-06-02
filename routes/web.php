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

Route::controller(\App\Http\Controllers\ListController::class)->group(function () {
    Route::get('/', 'listAll')->name('home');
    Route::get('/list', 'listWhere')->name('list');
    Route::get('/manage', 'manageAll')->name('manage');
});

Route::controller(\App\Http\Controllers\AlbumController::class)->group(function() {
    Route::get('/new/album', 'getFormNewAlbum')->name('form-new-album');
    Route::post('/add/album', 'addAlbum')->name('add-album');
    Route::delete('/delete/album/{album}', 'deleteAlbum')->name('delete-album');
});

Route::controller(\App\Http\Controllers\MusicController::class)->group(function() {
    Route::get('new/music', 'getFormNewMusic')->name('form-new-music');
    Route::post('add/music', 'addMusic')->name('add-music');
    Route::delete('/delete/music/{music}', 'deleteMusic')->name('delete-music');
});

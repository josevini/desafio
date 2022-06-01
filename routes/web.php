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

Route::get('/', [\App\Http\Controllers\AlbumController::class, 'listAlbums'])->name('home');

Route::get('/search', [\App\Http\Controllers\AlbumController::class, 'listAlbumsWhere'])->name('search');

Route::controller(\App\Http\Controllers\AlbumController::class)->group(function() {
    Route::get('/new/album', 'getFormNewAlbum')->name('form-new-album');
    Route::post('/add/album', 'addAlbum')->name('add-album');
    Route::delete('/delete/album/{album}', 'deleteAlbum')->name('delete-album');
});

Route::controller(\App\Http\Controllers\MusicController::class)->group(function() {
    Route::get('new/music', 'getFormNewMusic')->name('form-new-music');
    Route::post('add/music', 'addMusic')->name('add-music');
});

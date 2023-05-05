<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SongController;

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
    return view('home');
})->name('home');

// Artists Routes
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');
Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
/* Short alternative:
    Route::resource('artists', ArtistController::class)->except(['edit', 'update', 'destroy']);
*/

// Songs Routes
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');
Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy');
/* Short alternative:
    Route::resource('songs', SongController::class)->except('show');
*/


// Redirect for all others pages
Route::get('/{any?}', function () {
    return redirect()->route('home');
})->where('any', '.*');
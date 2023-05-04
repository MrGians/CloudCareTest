<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;

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

Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');
Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');


Route::get('/{any?}', function () {
    return redirect()->route('home');
})->where('any', '.*');
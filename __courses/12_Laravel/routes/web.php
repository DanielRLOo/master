<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{SeriesController};

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
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)
    ->only(['index', 'create', 'store', 'destroy']);

// Route::controller(SeriesController::class)->group(function () {
//
//     Route::get('/series', 'index')->name('series.index');
//
//     Route::get('/series/create', 'create')->name('series.create');
//
//     Route::post('/series', 'store')->name('series.store');
//
//     Route::get('/series/destroy', 'destroy')->name('series.destroy');
//
//     Route::get('/series/update', 'destroy')->name('series.update');
//
// });
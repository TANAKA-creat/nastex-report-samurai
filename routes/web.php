<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PhotoController;
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
    return view('welcome');
});

Route::resource('reports', ReportController::class)->middleware(['auth', 'verified']);
// Route::resource('photos', PhotoController::class);

Route::get('/photos/{photo}',[PhotoController::class,'show'])->name('photos.show');

Route::post('/photos/store', [PhotoController::class, 'store']) ->name('photos.store');
    


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
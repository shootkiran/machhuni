<?php

use App\Http\Livewire\ListWorkers;
use App\Http\Livewire\MyWorks;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/work/{work}/list-workers', ListWorkers::class)->name('work.list-workers');
    // Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    // Route::get('/my-works', MyWorks::class)->name('my-works');
    // Route::get('/work/{works}/list-workers', ListWorkers::class)->name('work.list-workers');
});

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
});
Route::resource('customers', App\Http\Controllers\CustomerController::class);
Route::resource('countries', App\Http\Controllers\CountryController::class);
Route::resource('towns', App\Http\Controllers\TownController::class);
Route::get('customers/{id}/travel', [App\Http\Controllers\CustomerController::class, 'travel'])->name('customers.travel');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

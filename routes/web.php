<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/application-status', function () { return view('application-status'); });
Route::get('/documents', function () { return view('documents'); });
Route::get('/billing', function () { return view('billing'); });
Route::get('/agreement', function () { return view('agreement'); });
Route::get('/calender', function () { return view('calender'); });
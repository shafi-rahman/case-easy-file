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
Route::get('/documentation-process', function () { return view('documentation-process'); });


// subcriber
Route::get('/home-guide', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/client-profile/{cid}', [App\Http\Controllers\ClientProfile::class, 'clientProfile']);

// subcriber user
Route::get('/dashboard', [App\Http\Controllers\Dashboard::class, 'subscriberDashboard']); 
Route::get('/cases', [App\Http\Controllers\Dashboard::class, 'cases']); 
Route::get('/email', [App\Http\Controllers\Dashboard::class, 'email']);
Route::get('/task', [App\Http\Controllers\Dashboard::class, 'task']);
Route::get('/calendar', [App\Http\Controllers\Dashboard::class, 'calendar']);
Route::get('/reporting', [App\Http\Controllers\Dashboard::class, 'reporting']);
Route::get('/client-prospects', [App\Http\Controllers\Dashboard::class, 'clientProspects']);
Route::get('/lead/{type}', [App\Http\Controllers\Dashboard::class, 'lead']);
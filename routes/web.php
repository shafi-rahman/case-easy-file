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
Route::get('/client-home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user-guide', function () { return view('user-guide'); });
// Route::get('/application-status', function () { return view('application-status'); });

Route::get('/documents', [App\Http\Controllers\HomeController::class, 'documents']);
Route::get('/my-form-fields', [App\Http\Controllers\HomeController::class, 'my_form_fields']);
Route::get('/billing', [App\Http\Controllers\HomeController::class, 'billing']);
Route::get('/application-status', [App\Http\Controllers\HomeController::class, 'application_status']);
Route::get('/agreement', [App\Http\Controllers\HomeController::class, 'agreement']);
Route::get('/calender', function () { return view('calender'); });
Route::get('/documentation-process', function () { return view('documentation-process'); });

Route::get('/user-managment', [App\Http\Controllers\HomeController::class, 'user_managment']);
Route::get('/user-managment/{user_id}', [App\Http\Controllers\HomeController::class, 'user_managment']);


// subcriber
Route::get('/home-guide', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/client-profile/{cid}', [App\Http\Controllers\ClientProfile::class, 'clientProfile']);

// subcriber user
Route::get('/dashboard', [App\Http\Controllers\Dashboard::class, 'subscriberDashboard']); 
Route::get('/dashboard/{type}', [App\Http\Controllers\Dashboard::class, 'subscriberDashboard']); 
Route::get('/cases', [App\Http\Controllers\Dashboard::class, 'cases']); 
Route::get('/email', [App\Http\Controllers\Dashboard::class, 'email']);
Route::get('/task', [App\Http\Controllers\Dashboard::class, 'task']);
Route::get('/calendar', [App\Http\Controllers\Dashboard::class, 'calendar']);
Route::get('/reporting/{type}', [App\Http\Controllers\Dashboard::class, 'reporting']);
Route::get('/client-prospects', [App\Http\Controllers\Dashboard::class, 'clientProspects']);
Route::get('/client-prospect-details/{cid}', [App\Http\Controllers\Dashboard::class, 'clientProspectDetails']); 
// Route::get('/lead/{type}', [App\Http\Controllers\Dashboard::class, 'lead']); 
Route::get('/follow-ups', [App\Http\Controllers\Dashboard::class, 'follow_ups']);

Route::get('/generateDocx', [App\Http\Controllers\Dashboard::class, 'generateDocx']);


// form managment
Route::get('/form-type', [App\Http\Controllers\HomeController::class, 'form_type']);
Route::get('/form-detail', [App\Http\Controllers\HomeController::class, 'form_detail']);


// Route::controller(StripePaymentController::class)->group(function(){
//     Route::get('stripe', 'stripe');
//     Route::post('stripe', 'stripePost')->name('stripe.post');
// });
Route::get('stripe', [App\Http\Controllers\StripePaymentController::class, 'stripe']);
Route::post('stripe', [App\Http\Controllers\StripePaymentController::class, 'stripePost'])->name('stripe.post');
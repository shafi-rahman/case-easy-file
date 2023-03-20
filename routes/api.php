<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientProfile;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!  
| 
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_client_details', [ClientProfile::class, 'get_client_details']);
Route::get('get_country_list', [ClientProfile::class, 'get_country_list']);  
Route::get('get_state_list', [ClientProfile::class, 'get_state_list']);
Route::get('get_city_list', [ClientProfile::class, 'get_city_list']);
Route::post('save_personal_details/{action}', [ClientProfile::class, 'save_personal_details']);
Route::post('check_email_already_exist', [ClientProfile::class, 'check_email_already_exist']);
Route::post('check_mobile_already_exist', [ClientProfile::class, 'check_mobile_already_exist']);
Route::post('save_educational_details/{action}', [ClientProfile::class, 'save_educational_details']);
Route::post('save_professional_details/{action}', [ClientProfile::class, 'save_professional_details']);



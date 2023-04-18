<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientProfile;
use App\Http\Controllers\commonController;

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

Route::post('get_main_menus', [commonController::class, 'get_main_menus']);

Route::get('get_client_details', [commonController::class, 'get_client_details']);
Route::get('get_country_list', [commonController::class, 'get_country_list']);  
Route::get('get_state_list', [commonController::class, 'get_state_list']);
Route::get('get_city_list', [commonController::class, 'get_city_list']);
Route::post('check_email_already_exist', [commonController::class, 'check_email_already_exist']);
Route::post('check_mobile_already_exist', [commonController::class, 'check_mobile_already_exist']);

Route::post('save_personal_details/{action}', [commonController::class, 'save_personal_details']);
Route::post('save_educational_details/{action}', [commonController::class, 'save_educational_details']);
Route::post('save_professional_details/{action}', [commonController::class, 'save_professional_details']);

Route::post('update_case_status_details', [commonController::class, 'update_case_status_details']);
Route::post('save_case_quote', [commonController::class, 'save_case_quote']);

Route::get('get_lead_status', [commonController::class, 'get_lead_status']);
Route::get('get_email_template_list', [commonController::class, 'get_email_template_list']);
Route::post('get_mail_template_content', [commonController::class, 'get_mail_template_content']);

Route::post('upload_case_excel_file', [commonController::class, 'upload_case_excel_file']); 
Route::post('upload_case_manually', [commonController::class, 'upload_case_manually']);
Route::post('send_mail', [commonController::class, 'send_mail']);
Route::post('update_document_approval_status', [commonController::class, 'update_document_approval_status']);

Route::post('upload_form_document', [commonController::class, 'upload_form_document']);
Route::post('genetare_form', [commonController::class, 'genetare_form']);

Route::post('sendEmail', [commonController::class, 'sendEmail']);


<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendGemail;
use Symfony\Component\HttpFoundation\Response;

use PhpOffice\PhpWord\TemplateProcessor;

class commonController extends Controller 
{
    public function upload_case_manually(Request $request){
        $rData = $request->data;
        try {
            // $request->validate(['mobile_number'=>'required']);
            // $request->validate(['visa_type'=>'required']);
            // $request->validate(['first_name'=>'required']);

            if(count(DB::table('user_personal_details')->where('mobile_number',  $rData['mobile_number'])->get())>0){
                return "Case mobile number already exist.";  
            } else {
                DB::table('user_personal_details')->insertGetId($rData);
                return "New case added successfully!";    
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function upload_case_excel_file(Request $request){
        try {
            $request->validate(['file'=>'required|mimes:csv|max:5120']);
            $file = $request->file('file');
            $filename = strtotime(now()).'_'.preg_replace('/[^A-Za-z\-]/', '', str_replace(' ', '', pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME))).'.'.$file->getClientOriginalExtension();
            $uPath = 'uploads/case_excels/';
            $file->move($uPath, $filename);

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($uPath.$filename, 'r');
            // Skip the first line
            fgetcsv($csvFile);            
            // Parse data from CSV file line by line
            $add = 0; $ext = 0;
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $insertArray['first_name'] = $line[0];
                $insertArray['email_id'] = $line[1];
                $insertArray['mobile_number'] = $line[2];
                $insertArray['date_of_birth'] = date('Y-m-d', strtotime($line[3]));
                $insertArray['marital_status'] = $line[4];
                $insertArray['highest_qualification'] = $line[5];
                $insertArray['work_experience'] = $line[6];
                $insertArray['visa_type'] = $line[7];
                $insertArray['source'] = $uPath.$filename;
                $insertArray['created_at'] = date('Y-m-d H:i:s');

                if(count(DB::table('user_personal_details')->where('email_id', $line[1])->where('mobile_number', $line[2])->get())>0){
                    $ext++;
                } else {
                    DB::table('user_personal_details')->insertGetId($insertArray);
                    $add++;
                }
            }
            // Close opened CSV file
            fclose($csvFile);

            return "$add New case added".($ext>0?" and $ext case already exist":"");

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function upload_form_document(Request $request){
        try{
            $file = $request->file('file');
            $filename = strtotime(now()).'_'.preg_replace('/[^A-Za-z\-]/', '', str_replace(' ', '', pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME))).'.'.$file->getClientOriginalExtension();
            $uPath = 'uploads/userdocs/';
            $file->move($uPath, $filename);

            // set row data
            $insertArray['case_id'] = $request->case_id;
            $insertArray['document'] = $uPath.$filename;
            $insertArray['doc_id'] = $request->did;
            $insertArray['status'] = 0;
            $insertArray['created_by'] = $request->created_by;
            if($request->status==0){
                $insertArray['created_at'] = date('Y-m-d H:i:s');
                $id = DB::table('user_form_document_data')->insertGetId($insertArray);
            } else {
                DB::table('user_form_document_data')
                    ->where('doc_id', $request->did)
                    ->where('case_id', $request->case_id)
                    ->update($insertArray);
                $id = $request->did;
            }

            return response()->json( array('success' => true, 'data'=>$insertArray, 'did'=>$request->did, 'date'=>date('d M Y')), 200 );

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update_document_approval_status(Request $request){
        try {
            $agrData['status'] = $request->status; 
            $agrData['updated_by'] = $request->updated_by; 
            $agrData['updated_at'] = date('Y-m-d H:i:s'); 
                DB::table('user_form_document_data')
                ->where('id', $request->id)
                ->update($agrData);
            return response()->json( array('success' => true, 'msg'=>$request->id, 'updated_by'=>'Admin'), 200 );
        } catch (\Exception $e) {
            return response()->json( array('success' => false, 'msg'=>$e->getMessage()), 200 );
        }
        
    }

    public function send_mail(Request $request){
        try {
            $emailData['case_id'] = $request->case_id;
            $emailData['media'] = $request->attach;
            $emailData['content'] = $request->content;
            $emailData['mailid'] = $request->mailid;
            $emailData['from_id'] = $request->managed_by; 
            $emailData['subject'] =  $request->sub;
            $emailData['status'] =  0;
            $emailData['created_at'] = date('Y-m-d H:i:s'); 
            $sid = DB::table('user_mail')->insertGetId($emailData);

            $agrData['status'] =  1; 
            DB::table('user_retainer_agreement')
            ->where('case_id', $request->case_id)
            ->update($agrData);

            return response()->json( array('success' => true, 'insID'=>$sid), 200 );


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function genetare_form(Request $request){
        // echo $request->form_id." : ".$request->case_id." : ";

        try {
            $userData = DB::table('user_personal_details')->where('id',$request->case_id)->first();
            $form = DB::table('user_forms')->select('id', 'form')->where('type', $request->form_id)->first();
            // $formData = DB::table('user_form_fields')->whereRaw("FIND_IN_SET($request->form_id, form_id)")->get();
            $formData = DB::table('user_form_fields')->get();
            $filename = strtotime(date('Y-m-d H:i:s')).'_'.str_replace(' ', '', $userData->first_name).'_'.$form->form;
            // $filename = strtotime(date('Y-m-d H:i:s')).'_'.str_replace(' ', '', $userData->first_name).'_'.pathinfo($form->form, PATHINFO_FILENAME);

            $location = 'uploads/userdocs/'.$filename;

            $templateProcessor = new TemplateProcessor('uploads/docs/'.$form->form);
            // echo "<pre>";
            foreach($formData as $data){
                // print_r($data);
                if($data->short_code_type==1){ 
                    $col = $data->field_name;
                    if(($data->where_col)=='id'||trim($data->where_col)=='case_id'){
                        $rdata = DB::table($data->short_code_from)->select($col)->where($data->where_col, $userData->id)->first()??'';
                    } else {
                        $rdata = DB::table($data->short_code_from)->select($col)->where($data->where_col, $userData->id)->first()??'';
                    }
                    if($rdata==''){
                        $templateProcessor->setValue($data->field_lebel, '------------------------');
                    } else {
                        if($data->depend_on!=''){
                            $get_col = $data->depend_on_get_col;
                            $srdata = DB::table($data->depend_on)->select($get_col)->where($data->depend_on_whr_col, $rdata->$col)->first()??'';
                            $templateProcessor->setValue($data->field_lebel, $srdata->$get_col);
                            // echo $rdata->$col." : "; echo $srdata->$get_col.' /// ';
                        } else {
                            $templateProcessor->setValue($data->field_lebel, $rdata->$col);
                        }
                    }
                } else {
                    $col = 'field_value';
                    $rdata = DB::table('user_form_field_data')->select($col)->where('field_id', $data->id)->where('case_id', $userData->id)->first()??'';
                    if($rdata==''){
                        $templateProcessor->setValue($data->field_lebel, '------------------------');
                    } else {
                        $templateProcessor->setValue($data->field_lebel, $rdata->$col);
                    }
                }
            }

            $templateProcessor->saveAs($location);
            
            return response()->json( array('success' => true, 'href'=> url($location)), 200 );

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        
    }

    static function sendGmail($email, $name, $userEmail, $userLogin, $action_url) {

        try{    
            $mailData = [
                'action_url' => $action_url,
                'userEmail' => $userEmail,
                'userLogin' => $userLogin,  
                'name' => $name
            ];
    
            Mail::to($email)->send(new SendGemail($mailData));
    
            return response()->json([
                'message' => 'Email has been sent.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function update_case_status_details(Request $request){

        try {
            $insertArray['case_id'] = $request->case_id;
            $insertArray['status'] = $request->status;
            $insertArray['notes'] = $request->notes;
            $insertArray['followup_date'] = date('Y-m-d', strtotime($request->followup_date));
            $insertArray['followup_time'] = date('H:i:s', strtotime($request->followup_time));
            $insertArray['created_by'] = 1;
            $insertArray['created_at'] = date('Y-m-d H:i:s');
            $insID = DB::table('user_communications')->insert($insertArray);

            $updateArray['status'] = $request->status;
            $updateArray['updated_at'] = date('Y-m-d H:i:s');
            $updateArray['updated_by'] = 1;
            DB::table('user_personal_details')
            ->where('id', $request->case_id)
            ->update($updateArray);


            //update logs
            // DB::table('logs')->insert( array('user_id'=>$request->user_id, 'action_performed'=>'user professional details inserted', 'action_id'=>$insID, 'jsondata'=>json_encode($insertArray), 'created_at'=>date('Y-m-d H:i:s')) );

            return response()->json( array('success' => true, 'insID'=>$insID), 200 );
           
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function save_case_quote(Request $request){
        try {
            // insert Quate
            $quoteData['case_id'] = $request->case_id;
            $quoteData['quote_amount'] = $request->quote_amount;
            $quoteData['notes'] = $request->notes;
            $quoteData['discount'] = $request->discount;
            $quoteData['payment_type'] = $request->payment_type;
            $quoteData['created_by'] = 1;
            $quoteData['created_at'] = date('Y-m-d H:i:s');
            DB::table('user_payment_quote')->insertGetId($quoteData);

            // insert Quate
            $installmentData['case_id'] = $request->case_id;
            $installmentData['created_by'] = 1;
            $installmentData['created_at'] = date('Y-m-d H:i:s');

            for($i=0; $i<4; $i++){
                if(isset($request->amount[$i])&&$request->amount[$i]!=''){   
                    $installmentData['amount'] = $request->amount[$i];
                    $installmentData['due_date'] = date('Y-m-d', strtotime($request->due_date[$i]));
                    DB::table('user_payment_installment')->insert($installmentData);
                }
            } 


            //update logs
            // DB::table('logs')->insert( array('user_id'=>$request->user_id, 'action_performed'=>'user professional details inserted', 'action_id'=>$insID, 'jsondata'=>json_encode($insertArray), 'created_at'=>date('Y-m-d H:i:s')) );

            return response()->json( array('success' => true, 'insID'=>'aaaa'), 200 );

            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function get_country_list(){        
        return response()->json( DB::table('countries')->where('status', 1)->get() );
    } 
    public function get_state_list(Request $request){        
        return response()->json( DB::table('states')->where('country_id', $request->country_id)->get() );
    }
    public function get_city_list(Request $request){        
        return response()->json( DB::table('cities')->where('state_id', $request->state_id)->get() );
    }    
    public function check_email_already_exist(Request $request){
        return response()->json( DB::table('user_personal_details')->where('email_id', $request->email_id)->where('id', '!=', $request->case_id)->get() );
    }   
    public function check_mobile_already_exist(Request $request){
        return response()->json( DB::table('user_personal_details')->where('mobile_number', $request->mobile_number)->where('id', '!=', $request->case_id)->get() );
    }    
    public function get_client_details(Request $request) {
        $case_id = $request->case_id;

        $clientInfo['personal_details'] = DB::table('user_personal_details')->where('id', $case_id)->get();
        $clientInfo['educational_details'] = DB::table('user_educational_details')->where('user_id', $case_id)->get();
        $clientInfo['professional_details'] = DB::table('user_professional_details')->where('user_id', $case_id)->get();
        
        //ClientProfileModel::where('user_id', $request->id)->get();

        // $company_addres = DB::table('company_addres')->where('client_info_id', $clientInfo['client_info'][0]['id'])->get();
        // if(!empty($company_addres)){
        //     foreach($company_addres as $k=>$v){
        //       $clientInfo['address'][$k]['company_addres'] = $v;
        //       $clientInfo['address'][$k]['contact_person'] = DB::table('company_contact_person')->where('company_addres_id', $v->id)->get();
        //     }
        // }
        return response()->json( $clientInfo );
    }

    public function get_lead_status(){        
        return response()->json( DB::table('user_status')->where('status', 1)->get() );
    } 
    public function get_email_template_list(){        
        return response()->json( DB::table('email_template')->select('id', 'content_subject')->where('status', 1)->get() );
    } 
    public function get_mail_template_content(Request $request){
        return response()->json( DB::table('email_template')->select('content_body')->where('id', $request->eid)->get()[0] );
    } 

    public function save_personal_details(Request $request, $action){  


        // $request->validate([
        //     'first_name'        => 'required',
        //     // 'middle_name'       => 'required',
        //     // 'email_id'          =>  "required|email|unique:user_personal_details,email_id,$user_id" ,
        //     // 'mobile_number'     =>  "required|unique:user_personal_details,mobile_number,$user_id",
        //     'date_of_birth'     => 'required',
        //     'marital_status'    => 'required',
        //     'address'           => 'required',
        //     'country'           => 'required',
        //     'state'             => 'required',
        //     'city'              => 'required',
        //     'pin_code'          => 'required',
        //     'visa_type'          => 'visa_type',
        // ]);
  
        $insertArray['user_id'] = $request->user_id;
        $insertArray['first_name'] = $request->first_name;
        $insertArray['middle_name'] = $request->middle_name;
        $insertArray['last_name'] = $request->last_name;
        $insertArray['email_id'] = $request->email_id;
        $insertArray['mobile_number'] = $request->mobile_number;
        $insertArray['date_of_birth'] = $request->date_of_birth;
        $insertArray['gender'] = $request->gender;
        $insertArray['marital_status'] = $request->marital_status;
        $insertArray['address'] = $request->address;
        $insertArray['country'] = $request->country;
        $insertArray['state'] = $request->state;
        $insertArray['city'] = $request->city; 
        $insertArray['pin_code'] = $request->pin_code;
        $insertArray['visa_type'] = $request->visa_type;
        $insertArray['updated_at'] = date('Y-m-d H:i:s');
        $insertArray['updated_by'] = 1;
        
        try {

            if($action=='createaccount'){
                $pass = Str::random(10);
                $createUser['name'] = $request->first_name;
                $createUser['email'] = $request->email_id;
                $createUser['role'] = 6;
                $createUser['password'] = Hash::make($pass);
                $createUser['created_at'] = date('Y-m-d H:i:s');
                $insID = DB::table('users')->insertGetId($createUser);
                $insertArray['user_id'] = $insID;
                
                DB::table('user_personal_details')
                ->where('id', $request->id)
                ->update($insertArray);

                // send welcome mail 
                app('App\Http\Controllers\commonController')->sendGmail($request->email_id, $request->first_name, $request->email_id, $pass, URL::to('/login'));
                // $res = commonController::send_gmail($request->email_id, $request->first_name, $request->email_id, $pass, URL::to('/login');
                //update logs
                // DB::table('logs')->insert( array('user_id'=>$request->user_id, 'action_performed'=>'user personal details inserted', 'action_id'=>$insID, 'jsondata'=>json_encode($insertArray), 'created_at'=>date('Y-m-d H:i:s')) );

                return response()->json( array('success' => true, 'insID'=>'send mail'), 200 );
            } else if($request->case_id!=''){
                DB::table('user_personal_details')
                ->where('id', $request->case_id)
                ->update($insertArray);
               
                //update logs
                // DB::table('logs')->insert( array('user_id'=>$request->user_id, 'action_performed'=>'user personal details updated', 'action_id'=>$request->id, 'jsondata'=>json_encode($insertArray), 'created_at'=>date('Y-m-d H:i:s')) );

                return response()->json( array('success' => true, 'insID'=>$request->id), 200 );
            }

            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }
    
    public function save_educational_details(Request $request, $action){ 
        $insertArray['user_id'] = $request->user_id;
        $insertArray['secondary'] = $request->secondary;
        $insertArray['secondary_country'] = $request->secondary_country;
        $insertArray['secondary_board'] = $request->secondary_board;
        $insertArray['secondary_year'] = $request->secondary_year;
        $insertArray['senior_secondary'] = $request->senior_secondary;
        $insertArray['senior_secondary_country'] = $request->senior_secondary_country;
        $insertArray['senior_secondary_board'] = $request->senior_secondary_board;
        $insertArray['senior_secondary_year'] = $request->senior_secondary_year;
        $insertArray['bachelor'] = $request->bachelor;
        $insertArray['bachelor_country'] = $request->bachelor_country;
        $insertArray['bachelor_board'] = $request->bachelor_board;
        $insertArray['bachelor_year'] = $request->bachelor_year;
        $insertArray['master'] = $request->master;
        $insertArray['master_country'] = $request->master_country;
        $insertArray['master_board'] = $request->master_board;
        $insertArray['master_year'] = $request->master_year;

        try {
            if($action=='insert'){
                $insertArray['created_at'] = date('Y-m-d H:i:s');
                $insID = DB::table('user_educational_details')->insertGetId($insertArray);
                //update logs
                DB::table('logs')->insert( array('user_id'=>$request->user_id, 'action_performed'=>'user educational details inserted', 'action_id'=>$insID, 'jsondata'=>json_encode($insertArray), 'created_at'=>date('Y-m-d H:i:s')) );

                return response()->json( array('success' => true, 'insID'=>$insID), 200 );
            } else if($request->user_id!=''){
                $insertArray['updated_at'] = date('Y-m-d H:i:s');
                DB::table('user_educational_details')
                ->where('user_id', $request->user_id)
                ->update($insertArray);
                //update logs
                DB::table('logs')->insert( array('user_id'=>$request->user_id, 'action_performed'=>'user educational details updated', 'action_id'=>$request->id, 'jsondata'=>json_encode($insertArray), 'created_at'=>date('Y-m-d H:i:s')) );

                return response()->json( array('success' => true, 'insID'=>$request->educationalId), 200 );
            }

            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function save_professional_details(Request $request, $action){ 
        $insertArray['user_id'] = $request->user_id;
        $insertArray['experience_year'] = $request->experience_year;
        $insertArray['description'] = $request->description;

        try {
            if($action=='insert'){
                $insertArray['created_at'] = date('Y-m-d H:i:s');
                $insID = DB::table('user_professional_details')->insertGetId($insertArray);
                //update logs
                DB::table('logs')->insert( array('user_id'=>$request->user_id, 'action_performed'=>'user professional details inserted', 'action_id'=>$insID, 'jsondata'=>json_encode($insertArray), 'created_at'=>date('Y-m-d H:i:s')) );

                return response()->json( array('success' => true, 'insID'=>$insID), 200 );
            } else if($request->user_id!=''){
                $insertArray['updated_at'] = date('Y-m-d H:i:s');
                DB::table('user_professional_details')
                ->where('user_id', $request->user_id)
                ->update($insertArray);
                //update logs
                DB::table('logs')->insert( array('user_id'=>$request->user_id, 'action_performed'=>'user professional details updated', 'action_id'=>$request->id, 'jsondata'=>json_encode($insertArray), 'created_at'=>date('Y-m-d H:i:s')) );

                return response()->json( array('success' => true, 'insID'=>$request->professionalId), 200 );
            }

            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

}

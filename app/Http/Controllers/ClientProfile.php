<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use SebastianBergmann\CodeCoverage\Driver\Selector;

class ClientProfile extends Controller
{
    public function clientProfile(Request $request){

        $uid = Crypt::decryptString($request->segment(2));
        
        // $data['userDetails'] = DB::table('user_personal_details')->where('id', $uid)->first();
        
        // case assign to
        if(!DB::table('user_assign_to')->where('status', 1)->where('case_id', $uid)->first()){
            DB::table('user_assign_to')->insert( array('case_id'=>$uid, 'user_id'=>Auth::user()->id, 'status'=>1, 'notes'=>'Auto assign white check first time', 'created_by'=>1, 'created_at'=>date('Y-m-d H:i:s')) );
        }       

        $data['userDetails'] = DB::table('user_personal_details')
        ->select('user_personal_details.*', 'user_status.name as currentstatus')
        ->join('user_status', 'user_status.id', '=', 'user_personal_details.status')
        ->where('user_personal_details.id', $uid)
        ->first();

        $data['userPaymentDetails'] = DB::table('user_payment_quote')
        ->select('user_payment_quote.*', 'user_payment_installment.*')
        ->join('user_payment_installment', 'user_payment_installment.case_id', '=', 'user_payment_quote.case_id')
        ->where('user_payment_quote.case_id', $uid)
        ->get();

        // echo "<pre>".$view;
        // print_r($data);
        // die();

        return view('client-profile', $data);
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

                //update logs
                // DB::table('logs')->insert( array('user_id'=>$request->user_id, 'action_performed'=>'user personal details inserted', 'action_id'=>$insID, 'jsondata'=>json_encode($insertArray), 'created_at'=>date('Y-m-d H:i:s')) );

                return response()->json( array('success' => true, 'insID'=>$insID), 200 );
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

    public function get_lead_status(){        
        return response()->json( DB::table('user_status')->where('status', 1)->get() );
    } 
    public function get_email_template_list(){        
        return response()->json( DB::table('email_template')->select('id', 'content_subject')->where('status', 1)->get() );
    } 
    public function get_mail_template_content(Request $request){
        return response()->json( DB::table('email_template')->select('content_body')->where('id', $request->eid)->get()[0] );
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
                    $installmentData['due_date'] = date('Y-m-d', strtotime($request->amount[$i]));
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

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                $insertArray['date_of_birth'] = $line[3];
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
}

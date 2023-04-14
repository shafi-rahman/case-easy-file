<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpWord\TemplateProcessor;

// use Illuminate\Support\Facades\CloudConvert;

// use CloudConvert\Laravel\CloudConvert;

// use \CloudConvert\Laravel\Facades\CloudConvert;

class Dashboard extends Controller
{
    public function subscriberDashboard(){

        return view('dashboard');
    } 

    public function teamDashboard(){

        return view('my-dashboard');
    }
    
    public function cases(){

        if(Auth::user()->role==2){
            $data['all_case'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.work_experience', 'C.visa_type', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->whereIn('C.status',  [1,2,3,4])->get();
            $data['connected'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.work_experience', 'C.visa_type', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->whereIn('C.status',  [5,13])->get();
            $data['in_active'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.work_experience', 'C.visa_type', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->whereIn('C.status',  [6,7,8,9,10,11,12])->get();

        } else {
            $data['all_case'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [1,2,3,4])->get();
            $data['connected'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [5,13])->get();
            $data['in_active'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [6,7,8,9,10,11,12])->get();
        }


        // echo "<pre>";
        // print_r($data['all_case']);
        // die();

        return view('cases', $data);
    }

    public function email(){

        return view('email');
    }
    
    public function task(){

        return view('task');
    } 
        
    public function calendar(){

        return view('calendar');
    } 

    public function reporting(){

        return view('reporting');
    }

    public function follow_ups(){ 
        if(Auth::user()->role==2){
            $data['all_case'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.work_experience', 'C.visa_type', 'A.user_id as assignto', 'S.name as current_status', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->join('user_status as S', 'S.id', '=', 'C.status')
            ->where('A.user_id', Auth::user()->id)
            ->whereIn('C.status',  [1,2,3,4])->get();
        } else {
            $data['all_case'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [1,2,3,4])->get();
        }

        return view('follow-ups', $data);
    }

    public function clientProspects(){
        if(Auth::user()->role==2){
            $data['all_case'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.work_experience', 'C.visa_type', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->whereIn('C.status',  [1,2,3,4])->get();
            $data['connected'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.work_experience', 'C.visa_type', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->whereIn('C.status',  [5,13])->get();
            $data['in_active'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.work_experience', 'C.visa_type', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->whereIn('C.status',  [6,7,8,9,10,11,12])->get();

        } else {
            $data['all_case'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [1,2,3,4])->get();
            $data['connected'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [5,13])->get();
            $data['in_active'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [6,7,8,9,10,11,12])->get();
        }

        return view('client-prospects', $data);
    }

    public function clientProspectDetails(Request $request){
        $uid = Crypt::decryptString($request->segment(2));

        $data['userDetails'] = DB::table('user_personal_details as C')
        ->select('C.*', 'user_status.name as currentstatus', 'visa_type.name as visa_type', 'visa_type.id as visa_id', 'user_marital_status.name as user_marital_status')
        ->join('user_status', 'user_status.id', '=', 'C.status')
        ->leftjoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
        ->leftjoin('user_marital_status', 'user_marital_status.id', '=', 'C.marital_status')
        ->where('C.id', $uid)
        ->first();
        $data['userDetails']->managed_by = Auth::user()->id;
        $data['paymentQuote'] = DB::table('user_payment_quote')->where('case_id', $uid)->first(); 
        $data['userPaymentInstallment'] = DB::table('user_payment_installment')->where('case_id', $uid)->get();
        
        $ufd = DB::table('user_form_documents')->where('form_id', $data['userDetails']->visa_id)->get();
        if(count($ufd)>0){
            foreach($ufd as $i=>$d){
                $data['userFormDocuments'][$i]['doc'] = $d;
                $data['userFormDocuments'][$i]['data'] = DB::table('user_form_document_data AS D')->select('D.*', 'U.name as updated_by')->join('users AS U', 'U.id', '=', 'D.updated_by')->where('doc_id', $d->id)->where('case_id', $uid)->first();
            }
        }

        if(DB::table('user_retainer_agreement')->where('case_id', $uid)->first()==null){
            $formdata = DB::table('user_forms')->select('id', 'form')->where('type', 7)->first();
            $filename = strtotime(date('Y-m-d H:i:s')).'_'.str_replace(' ', '', $data['userDetails']->first_name).'_Retainer-Agreement';
            $formData = DB::table('user_form_fields')->where("form_id", $formdata->id)->get();
            if($fn = $this->generateDocx($filename, $formData, $uid)){
                $agrmntData['case_id'] = $uid;
                $agrmntData['agreement'] = $fn;
                $agrmntData['status'] = 0;
                $agrmntData['created_by'] = 1;
                $agrmntData['created_at'] = date('Y-m-d H:i:s');
                DB::table('user_retainer_agreement')->insertGetId($agrmntData);
            }
        }
        
        $data['userRetainerAgreement'] = DB::table('user_retainer_agreement')->where('case_id', $uid)->first();
        

        return view('client-prospect-details', $data);
    }
    
    public function lead(Request $request, $type ){

        return view('lead', ['type'=>$type]);
    }


    public function generateDocx($filename, $formData, $uid)
    {
        try {
            $location = 'uploads/userdocs/'.$filename.'.docx';

            $templateProcessor = new TemplateProcessor('uploads/docs/Retainer-Agreement.docx');

            foreach($formData as $data){
                if($data->short_code_type==1){ 
                    $col = $data->field_name;
                    $rdata = DB::table($data->short_code_from)->select($col)->where($data->where_col, $uid)->first();
                    $templateProcessor->setValue($col, $rdata->$col);
                } else {
                    $col = 'field_value';
                    $rdata = DB::table('user_form_field_data')->select($col)->where('field_id', $data->id)->where('case_id', $uid)->first();
                    $templateProcessor->setValue($data->field_name, $rdata->$col);
                }
            }

            $templateProcessor->saveAs($location);
            return $location;

            // CloudConvert::file($location)->to('invoice.pdf');


            //Load export library
            // $domPdfPath = base_path( 'vendor/dompdf/dompdf');
            // \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            // \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            // $Content = \PhpOffice\PhpWord\IOFactory::load($location); 
            // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content, 'PDF');
            // $pdfLocation = public_path('uploads/userdocs/'.$filename.'.pdf');
            // $xmlWriter->save($pdfLocation, true);
            


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
    
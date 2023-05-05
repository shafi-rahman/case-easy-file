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
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function subscriberDashboard(){

        $data['seg'] = request()->segment(2)==''?'eyJpdiI6IkFvWllpcGc1Q3p5b2lhVWRrZVlDZnc9PSIsInZhbHVlIjoiclJPVklrUVkrNVU4NEFiS09oKzZQZz09IiwibWFjIjoiYjQ5YTAxYzU3NmIwOTUyZGJkZmVhNzdmNzE5OWVkZWY1NWY3NGUyNDFhNmJhZmI2M2U5NjA5NDdlYjIzMGQ2MyIsInRhZyI6IiJ9':request()->segment(2);

        return view('dashboard', $data);
    } 

    public function teamDashboard(){

        return view('my-dashboard');
    }
    
    public function cases(){

        if(Auth::user()->role==2){
            $data['all_case'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification',  'C.ielts', 'C.work_experience', 'C.visa_type', 'visa_type.name as visa_name', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->leftJoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
            ->whereIn('C.status',  [1,2,3,4])->get();
            $data['connected'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification',  'C.ielts', 'C.work_experience', 'C.visa_type', 'visa_type.name as visa_name', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->leftJoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
            ->whereIn('C.status',  [5,13])->get();
            $data['in_active'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.ielts', 'C.work_experience', 'C.visa_type', 'visa_type.name as visa_name', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->leftJoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
            ->whereIn('C.status',  [6,7,8,9,10,11,12])->get();

        } else {
            $data['all_case'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [1,2,3,4])->get();
            $data['connected'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [5,13])->get();
            $data['in_active'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [6,7,8,9,10,11,12])->get();
        }


        // echo "<pre>";
        // print_r($data['in_active']);
        // die();

        return view('cases', $data);
    }

    
    public function email(){
        $data['emailTemplate'] = DB::table('email_template')->get();
        return view('email', $data);
    }
    
    public function task(){
        if(isset($_GET['submitformfield'])&&$_GET['submitformfield']=='submit'){
            unset($_GET['submitformfield']);
            foreach($_GET['fields'] as $k=>$v){
                if(DB::table('user_form_field_data')->where('case_id', $_GET['case_id'])->where('field_id', $k)->first()){
                    DB::table('user_form_field_data')->where('case_id', $_GET['case_id'])->where('field_id', $k)->update(['field_value'=> $v]);
                } else {
                    DB::table('user_form_field_data')->insert(array('case_id'=>$_GET['case_id'], 'field_id'=>$k, 'field_value'=>$v, 'created_at'=>date('Y-m-d H:i:s')) );
                }
            }
        }

        $data['created_by'] = Auth::user()->id;
        $data['tasks'] = DB::table('tasks as T')->select('T.*', 'U.name', 'U.email', 'R.id as roleid', 'R.name as role')
        ->join('users as U', 'U.id', '=', 'T.created_by')
        ->join('roles as R', 'R.id', '=', 'U.role')
        ->orderBy('id','DESC')
        ->get();

        return view('task', $data);
    } 
        
    public function calendar(){
        $data['created_by'] = Auth::user()->id;
        $tasksList = DB::table('tasks as T')->select('T.id',DB::raw('@calendar_status:=5 as calendar_status'),  'T.task_title', 'T.task_detail', 'T.task_date', 'T.task_time', 'T.status', 'T.created_at', 'U.name', 'U.email', 'R.id as roleid', 'R.name as role')
        ->join('users as U', 'U.id', '=', 'T.created_by')
        ->join('roles as R', 'R.id', '=', 'U.role')
        ->get()->toArray();

        $caseComList = DB::table('user_communications as C')->select('C.case_id', 'P.status as calendar_status', 'P.first_name as task_title', 'C.notes as task_detail', 'C.followup_date as task_date', 'C.followup_time as task_time', 'C.status', 'C.created_at', 'U.name', 'U.email', 'R.id as roleid', 'R.name as role')
        ->join('user_personal_details as P', 'P.id', '=', 'C.case_id')
        ->join('users as U', 'U.id', '=', 'C.created_by')
        ->join('roles as R', 'R.id', '=', 'U.role')
        ->whereNotNull('followup_date')
        ->get()->toArray();

        $data['tasks'] = array_merge($tasksList, $caseComList);

        // echo "<pre>"; print_r($data); echo "</pre>";

        return view('calendar', $data);
    } 

    public function reporting(){

        return view('reporting');
    }

    public function follow_ups(){ 
        $Followups = DB::table('user_assign_to as A')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth',  'C.ielts', 'C.highest_qualification', 'C.work_experience', 'C.visa_type', 'visa_type.name as visa_name', 'A.user_id as assignto', 'A.created_at', 'S.name as current_status', 'P.quote_amount')
            ->join('user_personal_details as C', 'C.id', '=', 'A.case_id')
            ->leftJoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
            ->leftJoin('user_payment_quote as P', 'P.case_id', '=', 'C.id')
            ->join('user_status as S', 'S.id', '=', 'C.status')
            ->where('A.user_id',  Auth::user()->id)
            ->whereIn('C.status',  [1,2,3,4,5])
            ->orderBy('A.created_at', 'ASC')
            ->get();

            // echo "<pre>"; print_r($Followups); echo "</pre>"; die();

        if(count($Followups)>0){
            foreach($Followups as $i=>$followup){
                if($followup->quote_amount==''){
                    $f = DB::table('user_communications')->where('case_id',  $followup->id)->orderByDesc('id')->first();
                    if($f==NULL){
                        $data['todayFollowups'][$i] = $followup;
                        $data['todayFollowups'][$i]->followupDate = $followup->created_at;
                        $data['todayFollowups'][$i]->followupNotes = 'No action taken till';
                    } else {
                        if(strtotime($f->followup_date)<=strtotime(date('Y-m-d'))){
                            $data['todayFollowups'][$i] = $followup;
                            $data['todayFollowups'][$i]->followupDate = $f->followup_date;
                            $data['todayFollowups'][$i]->followupNotes = $f->notes;
                        } else {
                            $data['futureFollowups'][$i] = $followup;
                            $data['futureFollowups'][$i]->followupDate = $f->followup_date;
                            $data['futureFollowups'][$i]->followupNotes = $f->notes;
                        }
                    }
                }
            }
        }

        // echo "<pre>"; print_r($data); echo "</pre>"; die();

        return view('follow-ups', $data);
    }

    public function clientProspects(){
        /*
        if(Auth::user()->role==2){
            // $data['all_case'] = DB::table('user_personal_details as C')
            // ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.ielts', 'C.work_experience', 'C.visa_type', 'visa_type.name as visa_name', 'A.user_id as assignto', 'U.name')
            // ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            // ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            // ->leftJoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
            // ->whereIn('C.status',  [1,2,3,4])->get();
            $data['connected'] = DB::table('user_personal_details as C')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.ielts', 'C.work_experience', 'C.visa_type', 'visa_type.name as visa_name', 'A.user_id as assignto', 'U.name')
            ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            ->leftJoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
            ->whereIn('C.status',  [5,13])->get();
            // $data['in_active'] = DB::table('user_personal_details as C')
            // ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth', 'C.highest_qualification', 'C.ielts', 'C.work_experience', 'C.visa_type', 'visa_type.name as visa_name', 'A.user_id as assignto', 'U.name')
            // ->leftJoin('user_assign_to as A', 'A.case_id', '=', 'C.id')
            // ->leftJoin('users as U', 'U.id', '=', 'A.user_id')
            // ->leftJoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
            // ->whereIn('C.status',  [6,7,8,9,10,11,12])->get();

        } else {
            // $data['all_case'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [1,2,3,4])->get();
            $data['connected'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [5,13])->get();
            // $data['in_active'] = DB::table('user_personal_details as C')->select('C.*', 'C.user_id as name')->join('user_assign_to as A', 'C.id', '=', 'A.case_id')->whereIn('C.status',  [6,7,8,9,10,11,12])->get();
        }
        */


        $Followups = DB::table('user_assign_to as A')
            ->select('C.id', 'C.first_name', 'C.gender', 'C.date_of_birth',  'C.ielts', 'C.highest_qualification', 'C.work_experience', 'C.visa_type', 'visa_type.name as visa_name', 'A.user_id as assignto', 'A.created_at', 'U.name', 'S.name as current_status', 'P.quote_amount')
            ->join('user_personal_details as C', 'C.id', '=', 'A.case_id')
            ->leftJoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
            ->leftJoin('user_payment_quote as P', 'P.case_id', '=', 'C.id')
            ->join('user_status as S', 'S.id', '=', 'C.status')
            ->join('users as U', 'U.id', '=', 'A.user_id')
            ->where('A.user_id',  Auth::user()->id)
            ->whereIn('C.status',  [5, 13])
            ->orderBy('A.created_at', 'ASC')
            ->get();

            if(count($Followups)>0){
                foreach($Followups as $i=>$followup){
                    if($followup->quote_amount!=''){
                        $data['connected'][$i] = $followup;
                    }
                }
            }

        // echo "<pre>"; print_r($data); echo "</pre>"; die();

        return view('client-prospects', $data);
    }

    public function clientProspectDetails(Request $request){
        $uid = Crypt::decryptString($request->segment(2));

        $data['userDetails'] = DB::table('user_personal_details as C')
        ->select('C.*', DB::raw('@a:="clientProspectDetails" as actionFrom'), 'user_status.name as currentstatus', 'visa_type.name as visa_type', 'visa_type.id as visa_id', 'user_marital_status.name as user_marital_status')
        ->join('user_status', 'user_status.id', '=', 'C.status')
        ->leftjoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
        ->leftjoin('user_marital_status', 'user_marital_status.id', '=', 'C.marital_status')
        ->where('C.id', $uid)
        ->first();
        $data['userDetails']->managed_by = Auth::user()->id;
        $data['paymentQuote'] = DB::table('user_payment_quote')->where('case_id', $uid)->first(); 
        $data['userPaymentInstallment'] = DB::table('user_payment_installment')->where('case_id', $uid)->get();
        
        $visa_id = $data['userDetails']->visa_id;
        $ufd = DB::table('user_form_documents')->whereRaw("FIND_IN_SET($visa_id, form_id)")->get();

        if(count($ufd)>0){
            foreach($ufd as $i=>$d){
                $data['userFormDocuments'][$i]['doc'] = $d;
                $data['userFormDocuments'][$i]['data'] = DB::table('user_form_document_data AS D')->select('D.*', 'U.name as updated_by')->leftjoin('users AS U', 'U.id', '=', 'D.updated_by')->where('doc_id', $d->id)->where('case_id', $uid)->first();
            }
        }

        if(count($data['userPaymentInstallment'])>0){
            if(DB::table('user_retainer_agreement')->where('case_id', $uid)->first()==null){
                $form = DB::table('user_forms')->select('id', 'form')->where('type', 7)->first();
                $filename = strtotime(date('Y-m-d H:i:s')).'_'.str_replace(' ', '', $data['userDetails']->first_name).'_'.$form->form;
                // $formData = DB::table('user_form_fields')->where("form_id", $form->id)->get();
                $formData = DB::table('user_form_fields')->get();
               
                if($fn = $this->generateDocx($filename, $formData, $uid, Auth::user()->id)){
                    $agrmntData['case_id'] = $uid;
                    $agrmntData['agreement'] = $fn;
                    $agrmntData['status'] = 0;
                    $agrmntData['created_by'] = 1;
                    $agrmntData['created_at'] = date('Y-m-d H:i:s');
                    DB::table('user_retainer_agreement')->insertGetId($agrmntData);
                }
            }
        }

        $data['userRetainerAgreement'] = DB::table('user_retainer_agreement')->where('case_id', $uid)->first()??'';
        $data['userGenerateForm'] = DB::table('user_generate_form')->where('case_id', $uid)->where('form_id', $data['userDetails']->visa_id)->first()??'';
        
        // echo "<pre>"; 
        // print_r($data);
        // die();
        return view('client-prospect-details', $data);
    }
    
    public function lead(Request $request, $type ){

        return view('lead', ['type'=>$type]);
    }

    public function generateDocx($filename, $formData, $case_id, $user_id)
    {
        try {
            $location = 'uploads/userdocs/'.$filename;

            $templateProcessor = new TemplateProcessor('uploads/docs/Retainer-Agreement.docx');
            // echo "<pre>";
            foreach($formData as $data){
                // print_r($formData);
                if($data->short_code_type==1){ 
                    $col = $data->field_name;
                    if(($data->where_col)=='id'||trim($data->where_col)=='case_id'){
                        $rdata = DB::table($data->short_code_from)->select($col)->where($data->where_col, $case_id)->first()??'';
                    } else {
                        $rdata = DB::table($data->short_code_from)->select($col)->where($data->where_col, $user_id)->first()??'';
                    }
                    if($rdata==''){
                        $templateProcessor->setValue($data->field_lebel, '------------------------');
                    } else {
                        // $templateProcessor->setValue($data->field_lebel, $rdata->$col);
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
                    $rdata = DB::table('user_form_field_data')->select($col)->where('field_id', $data->id)->where('case_id', $case_id)->first()??'';
                    if($rdata==''){
                        $templateProcessor->setValue($data->field_lebel, '------------------------');
                    } else {
                        $templateProcessor->setValue($data->field_lebel, $rdata->$col);
                    }
                }
               
            }
            
            $templateProcessor->saveAs($location);

            // print_r($arr);
            // die();
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
    
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;

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
        ->select('C.*', 'user_status.name as currentstatus', 'visa_type.name as visa_type', 'user_marital_status.name as user_marital_status')
        ->join('user_status', 'user_status.id', '=', 'C.status')
        ->leftjoin('visa_type', 'visa_type.id', '=', 'C.visa_type')
        ->leftjoin('user_marital_status', 'user_marital_status.id', '=', 'C.marital_status')
        ->where('C.id', $uid)
        ->first();
        $data['paymentQuote'] = DB::table('user_payment_quote')
        ->where('case_id', $uid)
        ->first();
        $data['user_payment_installment'] = DB::table('user_payment_installment')
        ->where('case_id', $uid)
        ->get();

        // echo "<pre>";
        // print_r($data);

        return view('client-prospect-details', $data);
    }
    
    public function lead(Request $request, $type ){

        return view('lead', ['type'=>$type]);
    }






    public function generateDocx()
    {
        try {

            $filename = 'nitin_Retainer-Agreement.docx';

            $templateProcessor = new TemplateProcessor('uploads/docs/Retainer-Agreement.docx');
            $templateProcessor->setValue('firstname', 'Sohail');
            $templateProcessor->setValue('lastname', 'Saleem');
            $templateProcessor->saveAs('uploads/userdocs/'.$filename);

            

            //Load export library
        //   echo   $domPdfPath = base_path( 'vendor/dompdf/dompdf');
        //     \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        //     \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            // \PhpOffice\PhpWord\Settings::getPdfRendererPath(domPdfPath);

            $rendererName = \PhpOffice\PhpWord\Settings::PDF_RENDERER_DOMPDF;
           echo  $rendererLibraryPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRenderer($rendererName, $rendererLibraryPath);

            // $phpWord = \PhpOffice\PhpWord\IOFactory::load('uploads/userdocs/'.$filename); 


            // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
            // //save generated File
            // $pdfLocation = storage_path('app/public/converted/converted.pdf');
            // $xmlWriter->save($pdfLocation, true);
            // //return the file from controller
            // return response()->download($pdfLocation);


            $phpWord = IOFactory::load('uploads/userdocs/'.$filename);
            $phpWord->save($templateProcessor ,'PDF'); 

        } catch (\Exception $e) {
            return $e->getMessage();
        }
//         $phpWord = new \PhpOffice\PhpWord\PhpWord();


//         $section = $phpWord->addSection();


//         $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
// tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
// quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
// consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
// cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
// proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";


//         // $section->addImage("http://itsolutionstuff.com/frontTheme/images/logo.png");
//         $section->addText($description);


//         $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
//         try {
//             $objWriter->save(storage_path('helloWorld.docx'));
//         } catch (Exception $e) {
//         }


//         return response()->download(storage_path('helloWorld.docx'));
    }

}
    
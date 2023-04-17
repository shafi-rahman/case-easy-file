<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data =[];
        if(Session::get('menus')!=NULL){
            foreach (Session::get('menus') as $menu) {
                if(strtolower($menu->menu_label)=='home'){
                    $home = $menu->menu_link;
                }
            }
        } else {
            $home = 'home';
        }

        if(Auth::user()->role==6){
            $uid = DB::table('user_personal_details')->select('id')->where('user_id', Auth::user()->id)->first()->id;
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
        }

        // echo $home;
        // $home = 'home';
        // die();    


        return view($home, $data);
    }
    
    public function agreement(){
        $data['agreementDetails'] = DB::table('user_personal_details AS P')
        ->select('P.id', 'P.user_id', 'P.first_name', 'P.avatar', 'R.agreement', 'R.status as agreement_status', 'A.approved_at')
        ->join('user_retainer_agreement AS R', 'R.case_id', '=', 'P.id')
        ->join('user_retainer_agreement_approval AS A', 'A.ra_id', '=', 'R.id')
        ->where('P.user_id', Auth::user()->id)
        ->first();

        return view('agreement', $data);
    }

    public function billing(){
        $data['paymentQuote'] = DB::table('user_personal_details as P')->select('Q.*')
        ->join('user_payment_quote AS Q', 'Q.case_id', '=', 'P.id')
        ->where('P.user_id', Auth::user()->id)
        ->first();
        $data['paymentInstallment'] = DB::table('user_personal_details as P')->select('I.*')
        ->join('user_payment_installment AS I', 'I.case_id', '=', 'P.id')
        ->where('P.user_id', Auth::user()->id)
        ->get();

        return view('billing', $data);
    }

    public function documents(){
        
        // $data['userDocuments'] = DB::table('user_personal_details as P')->select('D.*')
        // ->join('user_form_documents AS D', 'D.form_id', '=', 'P.visa_type')
        // ->where('P.user_id', Auth::user()->id)
        // ->get();

        $udt = DB::table('user_personal_details')->select('id', 'visa_type', 'user_id')->where('user_id', Auth::user()->id)->first();

        $ufd = DB::table('user_form_documents')->where('form_id', $udt->visa_type)->get();
        
        if(count($ufd)>0){
            foreach($ufd as $i=>$d){
                $data['userDocuments'][$i]['case_id'] = $udt->id;
                $data['userDocuments'][$i]['created_by'] = Auth::user()->id;
                $data['userDocuments'][$i]['doc'] = $d;
                $data['userDocuments'][$i]['data'] = DB::table('user_form_document_data AS D')->select('D.*', 'U.name as updated_by')->leftjoin('users AS U', 'U.id', '=', 'D.updated_by')->where('doc_id', $d->id)->where('case_id', $udt->id)->first();
            }
        }
        // echo "<pre>"; print_r($data); echo "</pre>"; die();
        return view('documents', $data);
    }
    
}

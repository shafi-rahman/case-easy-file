<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use SebastianBergmann\CodeCoverage\Driver\Selector;

class ClientProfile extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function clientProfile(Request $request){

        $uid = Crypt::decryptString($request->segment(2));
        
        // $data['userDetails'] = DB::table('user_personal_details')->where('id', $uid)->first();
        
        // case assign to
        if(!DB::table('user_assign_to')->where('status', 1)->where('case_id', $uid)->first()){
            DB::table('user_assign_to')->insert( array('case_id'=>$uid, 'user_id'=>Auth::user()->id, 'status'=>1, 'notes'=>'Auto assign white check first time', 'created_by'=>1, 'created_at'=>date('Y-m-d H:i:s')) );
        }       

        $data['userDetails'] = DB::table('user_personal_details')
        ->select('user_personal_details.*', DB::raw('@a:="clientProfile" as actionFrom'), 'user_status.name as currentstatus', DB::raw('@a:='.Auth::user()->id.' as logedinuser'))
        ->join('user_status', 'user_status.id', '=', 'user_personal_details.status')
        ->where('user_personal_details.id', $uid)
        ->first();
        $data['userDetails']->managed_by = Auth::user()->id;

        $data['userPaymentDetails'] = DB::table('user_payment_quote as Q')
        ->select('Q.id', 'Q.case_id', 'Q.quote_amount', 'Q.notes as q_notes', 'Q.discount', 'Q.payment_type', 'Q.invoice_type', 'I.id as iid', 'I.amount as i_amount', 'I.due_date', 'I.status as i_status', 'P.id as pid', 'P.bank_name', 'P.ifsc', 'P.location', 'P.transaction_number', 'P.amount', 'P.notes', 'P.payment_date', 'P.attachment', )
        ->join('user_payment_installment as I', 'I.case_id', '=', 'Q.case_id')
        ->leftjoin('user_payment_paid as P', 'P.installment_id', '=', 'I.id')
        ->where('Q.case_id', $uid)
        ->get();

        // echo "<pre>";
        // print_r($data);
        // die();

        return view('client-profile', $data);
    }
 
    



}

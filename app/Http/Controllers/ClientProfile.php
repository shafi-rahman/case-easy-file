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
 
    



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientProfile extends Controller
{
    public function get_client_details(Request $request) {
        $clientInfo['personal_details'] = DB::table('user_personal_details')->where('user_id', $request->user_id)->get();
        
        
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
}

<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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

        $data['seg'] = request()->segment(2)==''?'eyJpdiI6IkFvWllpcGc1Q3p5b2lhVWRrZVlDZnc9PSIsInZhbHVlIjoiclJPVklrUVkrNVU4NEFiS09oKzZQZz09IiwibWFjIjoiYjQ5YTAxYzU3NmIwOTUyZGJkZmVhNzdmNzE5OWVkZWY1NWY3NGUyNDFhNmJhZmI2M2U5NjA5NDdlYjIzMGQ2MyIsInRhZyI6IiJ9':request()->segment(2);

        return view($home, $data);
    }
    
    public function agreement(){
        $data['agreementDetails'] = DB::table('user_personal_details AS P')
        ->select('P.id', 'P.user_id', 'P.first_name', 'P.avatar', 'R.agreement', 'R.status as agreement_status', 'A.approved_at')
        ->leftjoin('user_retainer_agreement AS R', 'R.case_id', '=', 'P.id')
        ->leftjoin('user_retainer_agreement_approval AS A', 'A.ra_id', '=', 'R.id')
        ->where('P.user_id', Auth::user()->id)
        ->first();

        return view('agreement', $data);
    }

    public function application_status(){

        $data['irccStatus'] = DB::table('user_personal_details as P')
        ->select('I.*')
        ->join('user_generate_form as F', 'F.case_id', '=', 'P.id')
        ->join('user_generate_form_to_ircc AS I', 'I.generate_form_id', '=', 'F.id')
        ->where('I.view_status', '1')
        ->where('P.user_id', Auth::user()->id)
        ->get();


        return view('application-status', $data);
    }

    public function billing(){
        $data['paymentQuote'] = DB::table('user_personal_details as P')->select('P.*', 'CT.city as city_name', 'S.name as state_name', 'C.name as country_name', 'Q.*')
        ->join('user_payment_quote AS Q', 'Q.case_id', '=', 'P.id')
        ->join('cities AS CT', 'CT.id', '=', 'P.city')
        ->join('states AS S', 'S.id', '=', 'P.state')
        ->join('countries AS C', 'C.id', '=', 'P.country')
        ->where('P.user_id', Auth::user()->id)
        ->first();

        $data['paymentInstallment'] = DB::table('user_personal_details as P')->select('I.*')
        ->join('user_payment_installment AS I', 'I.case_id', '=', 'P.id')
        ->where('P.user_id', Auth::user()->id)
        ->get(); 
        
        $data['paymentInvoice'] = DB::table('user_personal_details as P')->select('I.*')
        ->join('user_payment_paid AS I', 'I.case_id', '=', 'P.id')
        ->where('P.user_id', Auth::user()->id)
        ->get();

        $data['subscriberDetail'] = DB::table('user_subscriber_profile as P')->select('P.*', 'CT.city as city_name', 'S.name as state_name', 'C.name as country_name')
        ->join('cities AS CT', 'CT.id', '=', 'P.company_city')
        ->join('states AS S', 'S.id', '=', 'P.company_state')
        ->join('countries AS C', 'C.id', '=', 'P.company_country')
        ->first();


        return view('billing', $data);
    }

    public function documents(){
        
        // $data['userDocuments'] = DB::table('user_personal_details as P')->select('D.*')
        // ->join('user_form_documents AS D', 'D.form_id', '=', 'P.visa_type')
        // ->where('P.user_id', Auth::user()->id)
        // ->get();

        $udt = DB::table('user_personal_details')->select('id', 'visa_type', 'user_id')->where('user_id', Auth::user()->id)->first();

        $ufd = DB::table('user_form_documents')->whereRaw("find_in_set($udt->visa_type, form_id)")->get();
        
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

    public function user_managment(Request $request){

        $data['user_list'] = DB::table('users')->whereIn("role", [3,4,5])->get();    
        $data['user_details'] = '';
        if($request->segment(2)!=''){
            $uid = Crypt::decryptString($request->segment(2));
            $data['user_details'] = DB::table('users')->where("id", $uid)->first(); 
        }
        $data['aid'] = Auth::user()->id;
        
        // echo "<pre>"; print_r($data); echo "</pre>"; die();  
        return view('user-managment', $data);

    }

    public function my_form_fields(Request $request){
        
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

        $udt = DB::table('user_personal_details')->select('id', 'visa_type', 'user_id')->where('user_id', Auth::user()->id)->first();       
        $ufd = DB::table('user_form_fields')->whereRaw("find_in_set($udt->visa_type, form_id)")->where('short_code_type', 2)->get();
        
        if(count($ufd)>0){
            foreach($ufd as $i=>$d){
                $data['userFields'][$i]['case_id'] = $udt->id;
                $data['userFields'][$i]['field'] = $d;
                $data['userFields'][$i]['data'] = DB::table('user_form_field_data')->where('field_id', $d->id)->where('case_id', $udt->id)->first();
            }
        }

        // echo "<pre>"; print_r($data['userFields']); echo "</pre>"; die();
        return view('my-form-fields', $data);
    }
    
    public function form_type(){
        $data['formList'] = DB::table('visa_type')->get();       
        return view('form-type', $data);
    }
        
    public function form_detail(){

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

        $data['formList'] = DB::table('visa_type')->select('visa_type.*', 'user_forms.form')
        ->leftJoin('user_forms', 'user_forms.type', '=', 'visa_type.id')
        ->get();
        
        $data['shortCodes'] = DB::table('user_form_fields')->where('short_code_type', '1')->get();
        
        // echo "<pre>"; print_r($data); echo "</pre>";

        return view('form-detail', $data);
    }

}

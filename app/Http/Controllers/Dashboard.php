<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class Dashboard extends Controller
{
    public function subscriberDashboard(){

        return view('dashboard');
    } 

    public function teamDashboard(){

        return view('my-dashboard');
    }
    
    public function cases(){

        return view('cases');
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

        return view('client-prospects');
    }
    
    public function lead(Request $request, $type ){

        return view('lead', ['type'=>$type]);
    }
}

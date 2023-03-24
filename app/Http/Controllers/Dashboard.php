<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class Dashboard extends Controller
{
    public function teamDashboard(){

        return view('dashboard');
    }
    
    public function lead(Request $request, $type ){

        return view('lead', ['type'=>$type]);
    }
}

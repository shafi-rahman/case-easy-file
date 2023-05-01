<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    
    public static function calcPrecentage($total=0, $sub=0){
        return number_format( (($sub/$total)*100), 0);
    }

    public static function ageFromDOB($dob){
        $y = (date('Y') - date('Y',strtotime($dob)));
        return ($y!=0?$y:'');
    }
    
}


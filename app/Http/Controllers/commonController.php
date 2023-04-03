<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class commonController extends Controller
{
    public function upload_case_excel_file(Request $request){
        try {
            $request->validate(['file'=>'required|mimes:csv,xls,xlsx|max:2048']);

            $file = $request->file('file');
            $file->move('uploads/case_excels/', strtotime(now()).'_'.$file->getClientOriginalName());

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

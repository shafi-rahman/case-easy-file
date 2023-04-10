<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AddToSessionAfterLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $rid = Auth::user()->role;
        $menus = DB::table('menus')->select('id','menu_label', 'menu_link', 'menu_icon')->whereRaw("FIND_IN_SET($rid, role_id)")->where('status', 1)->orderBy('sort', 'ASC')->get();
        
        if(isset($menus)&&$menus!=NULL&&count($menus)>0){
            session(['menus' => $menus]);
        } else {
            Session::flush();
            Auth::logout();
        }
        
    }
}

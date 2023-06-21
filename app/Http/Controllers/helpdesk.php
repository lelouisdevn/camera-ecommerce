<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
session_start();
class helpdesk extends Controller
{
    //Ham gui yeu cau ho tro ky thuat
    public function saveHelpdesk(Request $request) {
        $UserId = session::get('UserId');
        if($UserId){
            $data = array();
            $data['ProductId'] = $request->ProductIdHidden;
            $data['UserId'] = $request->UserId;
            $data['OrderId'] = $request->OrderId;
            $data['HelpdeskEmail'] = $request->Email;
            $data['HelpdeskContent'] = $request->HelpdeskContent;
            $data['HelpdeskTime'] = Carbon::now()->format('d-m-Y H:i:s');
            
            DB::table('tbl_helpdesk')->insert($data);
            return redirect::to('ProductDetail/'.$data['ProductId']);
        }
        else {
            return redirect::to('UserLogin');
        }
    }

    public function listAllHelpdesk() {
        return view('admin.listHelpdesk');
    }
}

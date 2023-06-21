<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class search extends Controller
{
    //
    public function searchOrder(Request $request) {
        $OrderId = $request->OrderId;
        $Order = DB::table('tbl_orders')
        ->join('tbl_users', 'tbl_users.UserId', '=', 'tbl_orders.UserId')
        ->where('OrderId', $OrderId)->get();
        return view('admin.searchOrder')->with('Order', $Order)->with('OrderId', $OrderId);
    }
}

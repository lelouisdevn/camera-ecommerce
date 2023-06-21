<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class trademark extends Controller
{
    //
    public function AuthLogin() {
        $AdminId = Session::get('AdminId');
        if($AdminId){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('adminLogin')->send();
    }
   public function addNewTrademark() {
        $this->AuthLogin();
        return view('admin.addNewTrademark');
    }

    public function listAllTrademark() {
        $this->AuthLogin();
        $allTrademark = DB::table('tbl_trademark')->get();

        

        return view('admin.listTrademark')->with('Trademark', $allTrademark);
    }

    public function saveTrademark(Request $request) {
        $data = array();
        $data['TrademarkName'] = $request->TrademarkName;
        $data['TrademarkDescription'] = $request->TrademarkDescription;
        $data['TrademarkStatus'] = $request->TrademarkStatus;

        DB::table('tbl_trademark')->insert($data);

        Session::put('message', 'Thêm thương hiệu sản phẩm thành công!');
        return Redirect::to('addNewTrademark');
    }

    public function editTrademark($TrademarkId) {
        $this->AuthLogin();
        $editTrademark = DB::table('tbl_trademark')->where('TrademarkId', $TrademarkId)->get();

        return view('admin.editTrademark')->with('Trademark', $editTrademark);
    }

    public function updateTrademark(Request $request, $TrademarkId) {
        $data = array();
        $data['TrademarkName'] = $request->TrademarkName;
        $data['TrademarkDescription'] = $request->TrademarkDescription;

        DB::table('tbl_trademark')->where('TrademarkId', $TrademarkId)->update($data);
        echo 'Trademark updated successfully!';
        return Redirect::to('listAllTrademark');
    }

    public function deleteTrademark($TrademarkId) {
        $this->AuthLogin();
        DB::table('tbl_trademark')->where('TrademarkId', $TrademarkId)->delete();
        echo 'Trademark deleted successfully';
        return Redirect::to('listAllTrademark');
    }

//end admin trang

    public function showTrademark($TrademarkId) {
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->orderby('CategoryId', 'desc')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->orderby('TrademarkId', 'desc')->get();

        $Product = DB::table('tbl_product')
        ->join('tbl_trademark', 'tbl_trademark.TrademarkId', '=', 'tbl_product.TrademarkId')
        ->where('tbl_trademark.TrademarkId', $TrademarkId)->where('tbl_product.ProductStatus', '1')->paginate(6);

        $TrademarkName = DB::table('tbl_trademark')->where('tbl_trademark.TrademarkId', $TrademarkId)->get();

        return view('pages.Trademark.showTrademark')->with('Category', $Category)->with('Trademark', $Trademark)
        ->with('Product', $Product)->with('TrademarkName', $TrademarkName);
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index() {
        $category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->orderby('CategoryId', 'desc')->get();
        $trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->orderby('TrademarkId', 'desc')->get();

        $Slider = DB::table('tbl_product')->where('ProductSlider', '1')->get();
        return view('welcome')->with('Category', $category)->with('Trademark', $trademark)->with('Slider', $Slider);
    }
    public function search(Request $request) {
        $keyword = $request->keyword;
        $category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->orderby('CategoryId', 'desc')->get();
        $trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->orderby('TrademarkId', 'desc')->get();
        $Product = DB::table('tbl_product')->where('ProductName', 'like', '%'.$keyword.'%')->paginate('6');

        return view('pages.Product.search')->with('Category', $category)->with('Trademark', $trademark)->with('Product', $Product)->with('keyword', $keyword);
    }
}

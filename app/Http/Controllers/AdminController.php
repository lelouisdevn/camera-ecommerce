<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function AuthLogin() {
        $AdminId = Session::get('AdminId');
        if($AdminId){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('adminLogin')->send();
    }
    public function index() {
        return view('/adminLogin');
    }

    public function display_Dashboard() {
        $this->AuthLogin();
        $get = DB::table('tbl_product')->orderby('ProductSaled', 'desc')->limit('5')->get();
        return view('admin.dashboard')->with('Get', $get);
    }

    public function getIntoDashboard(Request $request) {
        $AdminEmail = $request->AdminEmail;
        $AdminPassword = $request->AdminPassword;

        $result = DB::table('tbl_admin')->where('AdminEmail', $AdminEmail)->where('AdminPassword', $AdminPassword)->first();
        if($result) {
            Session::put('AdminName', $result->AdminName);
            Session::put('AdminId', $result->AdminId);
            return Redirect::to('dashboard');
        }
        else {
            Session::put('message', 'Mật khẩu hoặc Email đăng nhập không đúng!');
            return Redirect::to('adminLogin');
        }
    } 
    public function logOut() {
            Session::put('AdminName', null);
            Session::put('AdminId', null);
            return Redirect::to('adminLogin');
    }
    public function manageOrder() {
        $this->AuthLogin();
        $allOrders = DB::table('tbl_orders')
        ->join('tbl_users', 'tbl_users.UserId', '=', 'tbl_orders.UserId')
        ->select('tbl_orders.*', 'tbl_users.UserName')
        ->orderby('tbl_orders.OrderId', 'desc')->paginate(7);
        return view('admin.OrderManagement')->with('allOrders', $allOrders);
    }
    public function listCustomers() {
        $UserInfo = DB::table('tbl_users')->paginate('7');
        return view('admin.listCustomers')->with('UserInfo', $UserInfo);
    }
    // public function orderDetail($UserId) {
    //     $UserInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();

    //     $orders = DB::table('tbl_orders')
    //     ->join('tbl_shipping', 'tbl_orders.ShippingId', '=', 'tbl_shipping.ShippingId')
    //     ->where('UserId', $UserId)->Orderby('OrderId', 'desc')->get();


    //     $orderDetail = DB::table('tbl_order_detail')
    //     ->join('tbl_orders', 'tbl_orders.OrderId', '=', 'tbl_order_detail.OrderId')
    //     ->join('tbl_product', 'tbl_product.ProductId', '=', 'tbl_order_detail.ProductId')
    //     ->where('tbl_orders.UserId', $UserId)->get();

    //     return view('User.userOrders')->with('UserInfo', $UserInfo)->with('Orders', $orders)
    //     ->with('Detail', $orderDetail);
    // }

    public function listSliders() {
        $Sliders = DB::table('tbl_product')->where('ProductSlider', '1')->get();
        return view('admin.listSliders')->with('Sliders', $Sliders);
    }

    public function addNewSlider() {
        $info = DB::table('tbl_product')->where('ProductSlider', '0')->get();
        return view('admin.addSlider')->with('Info', $info);
    }

    //Them 1 slider
    public function saveSlider($ProductId){
        $data = array();
        $slider = DB::table('tbl_product')->where('ProductId', $ProductId)->first();
        if($slider->ProductSlider == 1){
            Session::put('message', 'Id trên đã được chọn làm Slider, thêm slider không thành công!');
            return redirect::to('listSliders');
        }else{
            $data['ProductSlider'] = 1;
            DB::table('tbl_product')->where('ProductId', $ProductId)->update($data);
            Session::put('message', 'Thêm slider sản phẩm thành công!');
            return redirect::to('listSliders');    
        }
    }

    //Xoa 1 slider
    public function deleteSlider(Request $request, $ProductId){
        $data = array();
        $data['ProductSlider'] = 0;
        DB::table('tbl_product')->where('ProductId', $ProductId)->update($data);
        return redirect::to('listSliders');
    }

    public function deleteUser($UserId){
        DB::table('tbl_user_login')->where('UserId', $UserId)->delete();
    }

    public function news($NewsId){
        $News = DB::table('tbl_news')->join('tbl_admin', 'tbl_admin.AdminId', '=', 'tbl_news.AdminId')->where('tbl_news.NewsId', $NewsId)->get();
        $otherNews = DB::table('tbl_news')->whereNotIn('NewsId', [$NewsId])->get();
        $comment = DB::table('tbl_news_comment')->join('tbl_users', 'tbl_users.UserId', '=', 'tbl_news_comment.UserId')
        ->join('tbl_news', 'tbl_news.NewsId', '=', 'tbl_news_comment.NewsId')
        ->where('tbl_news_comment.NewsId', $NewsId)->get();
        return view('pages.news.news')->with('News', $News)->with('OtherNews', $otherNews)->with('Comment', $comment);
    }

    public function showAllNews() {
        $News = DB::table('tbl_news')->join('tbl_admin', 'tbl_admin.AdminId', '=', 'tbl_news.AdminId')->paginate('3');
        return view('admin.allNews')->with('News', $News);

    }

    public function addNews() {
        return view('admin.addNews');
    }

    public function saveNews(Request $request) {
        $data = array();
        $data['NewsTitle'] = $request->NewsTitle;
        $data['NewsContent'] = $request->NewsContent;
        $data['PostAt'] = Carbon::now()->format('d/m/Y');
        $data['AdminId'] = Session::get('AdminId');

        $getImage = $request->file('NewsImage');

        if($getImage){
            $getName = $getImage->getClientOriginalName();
            $stName = current(explode('.', $getName));
            $newImage = $stName.rand(0, 99).'.'.$getImage->getClientOriginalExtension();
            $getImage->move('public/Uploads/News', $newImage);

            $data['NewsImage'] = $newImage;
            DB::table('tbl_news')->insert($data);
            return Redirect::to('showAllNews');
        }
    }

    public function editNews($NewsId) {
        $News = DB::table('tbl_news')->where('NewsId', $NewsId)->get();
        return view('admin.editNews')->with('News', $News);
    }
    public function updateNews(Request $request, $NewsId){
        $data = array();
        $data['NewsTitle'] = $request->NewsTitle;
        $data['NewsContent'] = $request->NewsContent;

        $getImage = $request->file('NewsImage');

        if($getImage){
            $getName = $getImage->getClientOriginalName();
            $stName = current(explode('.', $getName));
            $newImage = $stName.rand(0, 99).'.'.$getImage->getClientOriginalExtension();
            $getImage->move('public/Uploads/News', $newImage);

            $data['NewsImage'] = $newImage;
            DB::table('tbl_news')->where('NewsId', $NewsId)->update($data);
            return Redirect::to('showAllNews');
        }
        DB::table('tbl_news')->where('NewsId', $NewsId)->update($data);
        return redirect::to('showAllNews');
    }

    public function deleteNews($NewsId) {
        DB::table('tbl_news')->where('NewsId', $NewsId)->delete();
        return redirect::to('showAllNews');
    }
}

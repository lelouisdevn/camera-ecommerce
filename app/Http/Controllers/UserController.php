<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
session_start();
class UserController extends Controller
{
     //Xac thuc nguoi dung co dang nhap hay chua
     public function AuthLogin() {
        $AdminId = Session::get('UserId');
        if($AdminId){
            return Redirect::to('/');
        }
        else return Redirect::to('UserLogin')->send();
    }
    public function registerAccount(){
        return view ('signUp');
    }
    public function UserRegister(Request $request) {
        $data = array();
        $data['UserName'] = $request->Name;
        $data['UserEmail'] = $request->Email;
        $data['UserPhoneNumber'] = $request->Phone;
        
        $date = $request->day;
        $month = $request->month;
        $year = $request->year;
        $data['UserDOB'] = $date."/".$month."/".$year;
        $data['UserGender'] = $request->Gender;
        $data['UserJoiningTime'] = Carbon::now()->format('d-m-Y');

        $customerId = DB::table('tbl_users')->insertGetId($data);
        
        $data_login['UserId'] = $customerId;
        $data_login['UserEmail'] = $request->Email;
        $data_login['UserPassword'] = $request->Password;

        DB::table('tbl_user_login')->insert($data_login);
        Session::put('UserId', $customerId);
        Session::put('UserName', $request->UserName);
        return redirect('/');
    }
    
    public function loginCheckOut() {
        return view('signIn');
    }

    public function pay(Request $request) {
        $UserId = Session::get('UserId');
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();
        $userInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();

        

        $shippingId = $request->shipping;
        $shipping = DB::table('tbl_shipping')->where('ShippingId', $shippingId)->get();

        $info = DB::table('tbl_cart')->join('tbl_product', 'tbl_product.ProductId', '=', 'tbl_cart.ProductId')
        ->where('UserId', $UserId)->get();

        return view('pages.cart.pay')->with('Category', $Category)->with('Trademark', $Trademark)->with('userInfo', $userInfo)->with('Info', $info)
        ->with('Shipping', $shipping)->with('ShippingId', $shippingId);
    }
    public function UserLogin() {
        return view('signIn');
    }
    public function authenticate(Request $request) {
        $UserEmail = $request->UserEmail;
        $UserPassword = $request->UserPassword;

        $result = DB::table('tbl_user_login')->join('tbl_users', 'tbl_users.UserId', '=', 'tbl_user_login.UserId')
            ->where('tbl_user_login.UserEmail', $UserEmail)
            ->where('tbl_user_login.UserPassword', $UserPassword)->first();

        if($result) {
            Session::put('UserName', $result->UserName);
            Session::put('UserId', $result->UserId);
            return redirect::to('/');
        }
        else {
            Session::put('message', 'Mật khẩu hoặc Email tài khoản không đúng!');
            return Redirect::to('UserLogin');
        }
    }
    public function signOut() {
        Session::put('UserName', null);
        Session::put('UserId', null);
        return redirect()->back();
    }

    //Hien thi trang ca nhan cua nguoi dung
    public function displayProfile($UserId) {
        $this->AuthLogin();
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();

        $UserInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();
        return view('User.userinformation')->with('Category', $Category)
        ->with('Trademark', $Trademark)->with('UserInfo', $UserInfo);
    }

    //Hien thi tat ca don hang ma nguoi dung da dat
    public function UserOrder($UserId) {
        $this->AuthLogin();
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();

        $UserInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();

        $orders = DB::table('tbl_orders')->join('tbl_shipping', 'tbl_orders.ShippingId', '=', 'tbl_shipping.ShippingId')->where('UserId', $UserId)->Orderby('OrderId', 'desc')->get();


        $orderDetail = DB::table('tbl_order_detail')->join('tbl_orders', 'tbl_orders.OrderId', '=', 'tbl_order_detail.OrderId')
        ->join('tbl_product', 'tbl_product.ProductId', '=', 'tbl_order_detail.ProductId')->where('tbl_orders.UserId', $UserId)
        ->get();
        return view('User.userOrders')->with('Category', $Category)->with('Trademark', $Trademark)->with('UserInfo', $UserInfo)
        ->with('Orders', $orders)->with('Detail', $orderDetail);
    }

   

    //Vao trang cai dat cua nguoi dung trong trang profle
    public function settings($UserId) {
        $this->AuthLogin();
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();

        $UserInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();
        return view('User.usersettings')->with('Category', $Category)->with('Trademark', $Trademark)->with('UserInfo', $UserInfo);
    }

    //Dieu huong den trang doi mat khau nguoi dung
    public function changePassword($UserId) {
        $this->AuthLogin();
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();

        $UserInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();
        return view('User.changePassword')->with('Category', $Category)->with('Trademark', $Trademark)->with('UserInfo', $UserInfo);
    }

    //Luu mat khau moi cua nguoi dung
    public function saveNewPassword(Request $request, $UserId) {
        $this->AuthLogin();

        $data = array();
        $data['UserPassword'] = $request->new_password;
        DB::table('tbl_user_login')->where('UserId', $UserId)->update($data);

        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();

        $UserInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();

        Session::put('message', 'Mật khẩu của bạn đã được đổi thành công!');
        return view('User.usersettings')->with('Category', $Category)
        ->with('Trademark', $Trademark)->with('UserInfo', $UserInfo);
    }

    //Xoa tai khoan nguoi dung
    public function deleteAccount($UserId) {
        $this->AuthLogin();
        DB::table('tbl_users')->where('UserId', $UserId)->delete();
        DB::table('tbl_user_login')->where('UserId', $UserId)->delete();
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();

        $UserInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();

        return redirect::to('signOut')->with('Category', $Category)
        ->with('Trademark', $Trademark)->with('UserInfo', $UserInfo);
    }

    //Cap nhat thong tin nguoi dung
    public function updateUserInfo(Request $request) {
        $this->AuthLogin();
        $data = array();
        $UserId = session::get('UserId');
        $data['UserId'] = $UserId;
        $data['UserName'] = $request->name;
        $data['UserPhoneNumber'] = $request->number;
        $data['UserAddress'] = $request->address;
        
        DB::table('tbl_users')->where('UserId',  $UserId)->update($data);
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();
        
        $UserInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();
        Session::put('message', 'Thông tin của bạn đã được cập nhật thành công!'); 
        return view('User.userinformation')->with('Category', $Category)->with('Trademark', $Trademark)->with('UserInfo', $UserInfo);
    }

    public function displayWishlist() {
        $this->AuthLogin(); //Xac nhan nguoi dung co dang nhap vao he thong thanh cong
        $UserId = Session::get('UserId');   //Lay Id cua nguoi dung thong qua Session

        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();

        $UserInfo = DB::table('tbl_users')->where('UserId', $UserId)->get();

        $WishlistInfo = DB::table('tbl_wishlist')->join('tbl_product', 'tbl_product.ProductId', '=', 'tbl_wishlist.ProductId')
        ->where('UserId', $UserId)->get();
        return view('User.wishlist')->with('Category', $Category)->with('Trademark', $Trademark)->with('UserInfo', $UserInfo)
        ->with('WishlistInfo', $WishlistInfo);
    }
    public function forgotpassword(){
        return view('User.forgotpassword');
    }

    public function verifyidentity($UserId) {
        return view('User.checkotp')->with('UserId', $UserId);
    }


}

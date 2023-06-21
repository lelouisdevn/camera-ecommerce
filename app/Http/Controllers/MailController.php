<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Mail;
use Session;
session_start();
class MailController extends Controller
{
    public function sendmail() {
        $UserId = Session::get('UserId');
        $User = DB::table('tbl_users')->where('UserId', $UserId)->first();
        $UserName = $User->UserName;
        //echo $UserName;
        $UserEmail = $User->UserEmail;
        //echo $UserEmail;

        $data = array('name'=>$UserName);
        Mail::send('mailsent', $data, function($message) use($UserEmail, $UserName) {
           $message->to($UserEmail, $UserName)->subject('Đơn hàng của bạn đã được đặt thành công');
           $message->from('atlanteansvietnam@outlook.com','Atlanteans');
        });
        echo "Đơn hàng của bạn đã được đặt thành công. Bạn sẽ trở về trang chủ sau 5 giây!";
        echo '<script> setTimeout(function(){window.location="Homepage"}, 5000); </script>';
    }

    public function checkEmail(Request $request){
        $Email = $request->UserEmail;
        $info = DB::table('tbl_users')->where('UserEmail', $Email)->first();
        if($info){
            $UserId = $info->UserId;
            //echo $UserId;
            $UserName = $info->UserName;
            //echo $UserName;
            $otp = rand(10000, 99999);
            //echo $otp;
            $dulieu = array();
            $dulieu['OTP'] = $otp;
            //echo $dulieu['OTP'];
            DB::table('tbl_user_login')->where('UserId', $UserId)->update($dulieu);
            $data = array('name'=>$UserName, 'otp'=>$otp);
            Mail::send('User.verifyotp', $data, function($message) use($Email, $UserName){
                $message->to($Email, $UserName)->subject('Yêu cầu đổi mật khẩu');
                $message->from('atlanteansvietnam@outlook.com', 'Atlanteans');
            });
        return redirect::to('verifyidentity/'.$UserId);
        }
            
    }

    public function checkotp(Request $request, $UserId){
        $otp = $request->OTP;
        $value = DB::table('tbl_user_login')->join('tbl_users', 'tbl_users.UserId', '=', 'tbl_user_login.UserId')
        ->where('tbl_user_login.UserId', $UserId)->first();
        $otp1 = $value->OTP;
        if($otp == $otp1){
            $newpass = rand(100000000, 999999999);
            $dulieu['UserPassword'] = $newpass;
            DB::table('tbl_user_login')->where('UserId', $UserId)->update($dulieu);

            $UserName = $value->UserName;
            $Email = $value->UserEmail;
            $data = array('name'=>$UserName, 'newpassword'=>$newpass);
            Mail::send('User.newpassword', $data, function($message) use($Email, $UserName){
            $message->to($Email, $UserName)->subject('Mật khẩu của bạn đã được thay đổi thành công!');
            $message->from('atlanteansvietnam@outlook.com', 'Atlanteans');
        });
        }
        $dl = array();
        $dl['OTP'] = null;
        DB::table('tbl_user_login')->where('UserId', $UserId)->update($dl);
        Session::put('message', 'Hãy sử dụng mật khẩu mới được gửi trong Email để đăng nhập.');
        return redirect::to('UserLogin');
    }
}

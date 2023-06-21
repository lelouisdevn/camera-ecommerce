<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Mail;
use Carbon\Carbon;
use Session;
session_start();
class news extends Controller
{
    public function saveNewsComment(Request $request, $NewsId){
        $UserId = Session::get('UserId');
        $data = array();

        $data['NewsCommentContent'] = $request->content;
        $data['UserId'] = $UserId;
        $data['NewsId'] = $NewsId;
        $data['NewsCommentTime'] = Carbon::now()->format('d-m-Y H:i:s');

        DB::table('tbl_news_comment')->insert($data);
        return redirect()->back();
    }
    public function listNewsComments(){
        $Comment = DB::table('tbl_news_comment')->join('tbl_users', 'tbl_users.UserId', '=', 'tbl_news_comment.UserId')
        ->join('tbl_news', 'tbl_news.NewsId', '=', 'tbl_news_comment.NewsId')->paginate('7');
        return view('admin.listNewsComment')->with('Comment', $Comment);
    }
}

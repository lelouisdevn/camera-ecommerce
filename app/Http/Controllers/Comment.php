<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();
class Comment extends Controller
{
    //
    public function addComment(Request $request, $ProductId){
        $getUser = Session::get('UserId');
        $getContent = $request->content;
        $getStar = $request->rate;
        if($getUser && $getContent && $getStar){
            $data = array();
            $data['UserId'] = session::get('UserId');
            $data['ProductId'] = $ProductId;
            $data['CommentContent'] = $request->content;
            $data['CommentTime'] = Carbon::now()->format('d-m-Y H:i:s');
            $data['CommentStar'] = $request->rate;
            DB::table('tbl_comment')->insert($data);
            return redirect::to('ProductDetail/'.$ProductId);
        }elseif ($getUser && !($getContent)) {
            // code...
            session::put('message', 'Bình luận không được để trống!');
            return redirect::to('ProductDetail/'.$ProductId);
        }elseif ($getUser && !($getStar)){
            session::put('message', 'Bạn cần đánh giá sản phẩm này!');
            return redirect::to('ProductDetail/'.$ProductId);
        }
        else{
            return redirect::to('/UserLogin');
        }
    }
    public function listAllComments() {
        $Comment = DB::table('tbl_comment')->join('tbl_product', 'tbl_product.ProductId', '=', 'tbl_comment.ProductId')
        ->join('tbl_users', 'tbl_users.UserId', 'tbl_comment.UserId')->orderby('CommentId', 'desc')->paginate(5);
        return view('admin.listAllComments')->with('Comment', $Comment);
    }

    //Xoa comment voi Id
    public function deleteComment($CommentId) {
        DB::table('tbl_comment')->where('CommentId', $CommentId)->delete();
        return redirect::to('listAllComments');
    }

    public function deleteManyComments(Request $request) {
        $data = $request->post;
        $data1 = $request->allComments;
        if($data1){
            DB::table('tbl_comment')->delete();
            return redirect::to('listAllComments');
        }else return redirect::to('deleteComment/'.$data);
    }
}

@extends('adminLayout')
@section('dashboard')

<style>
  .f1 {
    width: 100%;
    height: 30px;
    line-height: 30px;
    border-radius: 5px;
    background-color: #008c8a;
    color: white;
    padding-left: 10px;
    margin-bottom: 5px;
  }
  .f1:hover {
    background-color: black;
    color: white;
  }
  .f2 {
    width: 100%;
    height: 30px;
    line-height: 30px;
    border-radius: 5px;
    background-color: #ff010b;
    color: white;
    padding-left: 10px;
  }
  .f2:hover {
    background-color: darkred;
    color: white;
  }
</style>
<form action="{{URL::to('deleteManyComments')}}" method="POST">
            {{ csrf_field() }}
<div class="table-agile-info" style="padding: 2px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      QUẢN LÝ BÌNH LUẬN SẢN PHẨM
    </div>
    <div>
    <?php
      $message = Session::get('message');
      if($message) {
        echo $message;
        Session::put('message', null);
      };
    ?>
    <div>
    <div class="row w3-res-tb">

        <div class="col-sm-5 m-b-xs">

            <button type="submit" style="padding: 7px 20px; background: #c90002; color: white; border: none;border-radius: 5px;"
            onclick="return confirm('Bạn có chắc muốn xóa các bình luận được chọn?')">
            <i class="fa fa-trash"></i> Xóa
          </button>
        </div>

      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
          </span>
        </div>
      </div>
      <div style="margin-top: 50px; margin-left: 20px; margin-bottom: 20px;" id="abcd">
    <style>
      #abcd span {
        background: whitesmoke;
        padding: 10px;
        margin-right: 5px;
        border-radius: 5px;
      }
      #abcd a {
        color: black;
        font-size: 16px;
      }
      #abcd span {
        font-size: 16px;
      }
      #abcd a span:hover {
        background: green;
        color: white;
        transition: 400ms;
      }
      #abcd .f11:hover{
        background: red;
        color: white;
        transition: 400ms;
      }
    </style>
    <!-- <a href="{{URL::to('delete')}}">
      <span class="fa fa-trash f11" style="padding: 10px 20px; background: red; color: white;">
      <p style="font-family: sans-serif; display: inline-block; ">Delete</p>
      </span>
    </a> -->

    </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">

              <label class="i-checks m-b-none">
                <input type="checkbox" name="allComments"><i></i>
              </label>
            </th>
            <th>Sản phẩm</th>
            <th>Người dùng</th>
            <th>Bình luận</th>
            <th>Đánh giá</th>
            <th>Thời gian</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>


        @foreach ($Comment as $key => $cm)
          <tr>


              <td><label class="i-checks m-b-none"><input type="checkbox" name="post" value="{{ $cm->CommentId }}"><i></i></label></td>

            <td><img width="75px;" height="75px;" src="{{asset('/Uploads/Products/'.$cm->ProductImage)}}"></td>
            <td width="200px;">{{$cm->UserName}}</td>
            <td>
              {{$cm->CommentContent}}
            </td>
            <td width="130px;">
            <?php
                $a = $cm->CommentStar;
                for($i = 1; $i <= $a; $i++){
              ?>
                <span class="fa fa-star"></span>
                <?php
                }
                ?>
            </td>
            <td width="200px;"><span class="text-ellipsis">{{$cm->CommentTime}}</span></td>
            <td style="width: 100px;">
              <a href="{{URL::to('deleteComment/'.$cm->CommentId)}}"
              onclick="return confirm('Bạn có chắc muốn xóa bình luận này?')" class="active" ui-toggle-class="">
              <div style="width: 85px; font-size: 14px; text-align:center;padding-right:7px;" class="fa fa-trash text-danger text f2">
              </div></a>
            </td>
          </tr>
          @endforeach
          </form>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row" style="text-align: center;">


          {{ $Comment->links() }}

      </div>
    </footer>
  </div>
</div>


@endsection

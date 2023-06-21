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
    background-color: #007075;
    color: white;
  }
  .f2 {
    width: 100%;
    height: 30px;
    line-height: 30px;
    border-radius: 5px;
    background-color: #c90002;
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
      QUẢN LÝ BÀI VIẾT
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

            <!-- <button type="submit" style="padding: 7px 20px; background: #c90002; color: white; border: none;border-radius: 5px;"
            onclick="return confirm('Bạn có chắc muốn xóa các bình luận được chọn?')">
            <i class="fa fa-trash"></i> Xóa
            </button>   -->
            <a href="{{URL::to('addNews')}}">
              <span class="fa fa-plus-circle" style="padding: 10px 17px; background: #007075; color: white; border-radius: 5px;">
              <p style="font-family:sans-serif; display: inline-block;">Thêm</p>
              </span>
            </a>
            <a href="{{URL::to('deleteNews')}}">
              <span class="fa fa-trash f11" style="padding: 10px 20px; background: #c90002; color: white; border-radius: 5px;">
              <p style="font-family: sans-serif; display: inline-block; ">Xóa</p>
              </span>
            </a>
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
            <th>Admin</th>
            <th>Tiêu đề</th>
            <!-- <th>Nội dung</th> -->
            <th>Hình ảnh</th>
            <th>Thời gian</th>
            <!-- <th>Trạng thái</th> -->
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>


        @foreach ($News as $key => $ne)
          <tr>


              <td><label class="i-checks m-b-none"><input type="checkbox" name="post" value="{{ $ne->NewsId }}"><i></i></label></td>

            <td width="200px;">{{$ne->AdminName}}</td>
            <td width="450px;">
              {{$ne->NewsTitle}}
            </td>
            <!-- <td>
              {{$ne->NewsContent}}
            </td> -->
            <td><img width="300px" src="{{asset('/Uploads/News/'.$ne->NewsImage)}}"></td>
            <td width="200px;"><span class="text-ellipsis">{{$ne->PostAt}}</span></td>
            <!-- <td style="width: 100px;">
              <a href="{{URL::to('deleteComment/'.$ne->NewsId)}}"
              onclick="return confirm('Bạn có chắc muốn xóa bình luận này?')" class="active" ui-toggle-class="">
              <div style="width: 85px; font-size: 14px; text-align:center;padding-right:7px;" class="fa fa-trash text-danger text f2">
              </div></a>
            </td> -->
            <td style="width: 100px;">
              <a href="{{URL::to('editNews/'.$ne->NewsId)}}" class="active" ui-toggle-class="">
              <div style="width: 70px; font-size: 14px; text-align:center; padding-right:5px;" class="fa fa-pencil text-success text-active f1"></div></a>
            </td>
            <td style="width: 100px;">
              <a href="{{URL::to('deleteNews/'.$ne->NewsId)}}"
              onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')" class="active" ui-toggle-class="">
              <div style="width: 85px; font-size: 14px; text-align: center; padding-right:7px;" class="fa fa-trash text-danger text f2"> <span style="font-family: sans-serif; font-size: 14px;"></span></div></a>
            </td>
          </tr>
          @endforeach
          </form>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row" style="text-align: center;">


          {{ $News->links() }}

      </div>
    </footer>
  </div>
</div>


@endsection

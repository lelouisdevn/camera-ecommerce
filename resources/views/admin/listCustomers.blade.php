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
    background-color: #017071;
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
      QUẢN LÝ THÀNH VIÊN
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
            onclick="return confirm('Are you sure you want to delete these selected comments?')">
            <i class="fa fa-trash"></i> Xóa
          </button>        
        </div>
      
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">TÌm kiếm</button>
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
            <th>Mã thanh viên</th>
            <th>Tên thành viên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tham gia</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          

        @foreach ($UserInfo as $key => $cm)
          <tr>
            
            
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post" value="{{ $cm->UserId }}"><i></i></label></td>
            </form>
            <td width="200px;">{{$cm->UserId}}</td>
            <td>
              {{$cm->UserName}}
            </td>
            <td width="130px;">
                {{ $cm->UserEmail }}
            </td>
            <td>{{ $cm->UserAddress }}</td>
            <td width="200px;"><span class="text-ellipsis">{{ $cm->UserPhoneNumber }}</span></td>
            <td>{{ $cm->UserJoiningTime }}</td>
            <!-- <td style="width: 100px;">
              <a href="{{URL::to('orderDetail/'.$cm->UserId)}}" class="active" ui-toggle-class="">
              <div style="width: 100px; padding-left:45px;" class="fa fa-eye text-success text-active f1"></div></a>
            </td> -->
            <td style="width: 100px;">
              <a href="{{URL::to('deleteUser/'.$cm->UserId)}}" 
              onclick="return confirm('Bạn có chắc muốn xóa thành viên này?')" class="active" ui-toggle-class="">
              <div style="width: 85px; font-size: 14px; text-align: center; padding-right:7px;" class="fa fa-trash text-danger text f2"> <span style="font-family: sans-serif; font-size: 14px;"></span></div></a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row" style="text-align: center;">
        
                         
          {{ $UserInfo->links() }}

      </div>
    </footer>
  </div>
</div>


@endsection
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
<div class="table-agile-info" style="padding: 2px;">
  <div class="panel panel-default">
    <div class="panel-heading">
        QUẢN LÝ THƯƠNG HIỆU
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
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <!-- <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>-->
        <a href="{{URL::to('addNewTrademark')}}">
          <span class="fa fa-plus-circle" style="padding: 10px 17px; background: #007075; color: white; border-radius: 5px;">
          <p style="font-family:sans-serif; display: inline-block;">Thêm</p>
          </span>
        </a>
        <a href="{{URL::to('delete')}}">
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
    
    
    </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên thương hiệu</th>
            <th>Hiển thị</th>
            <th>Mô tả</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($Trademark as $key => $catePro)


          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $catePro->TrademarkName }}</td>
            <td><span class="text-ellipsis">
              
              <?php
                if($catePro->TrademarkStatus == 0){
                  echo 'An';
                }else{
                  echo 'Hien thi';
                }
              ?>

            </span></td>
            <td><span class="text-ellipsis">{{ $catePro->TrademarkDescription }}</span></td>
            <td style="width: 100px;">
              <a href="{{URL::to('editTrademark/'.$catePro->TrademarkId)}}" class="active" ui-toggle-class="">
              <div style="width: 70px; font-size: 14px; text-align:center; padding-right:5px;" class="fa fa-pencil text-success text-active f1"></div></a>
            </td>
            <td style="width: 100px;">
              <a href="{{URL::to('deleteTrademark/'.$catePro->TrademarkId)}}" 
              onclick="return confirm('Bạn có chắc muốn xóa thương hiệu này?')" class="active" ui-toggle-class="">
              <div style="width: 85px; font-size: 14px; text-align: center; padding-right:7px;" class="fa fa-trash text-danger text f2"> <span style="font-family: sans-serif; font-size: 14px;"></span></div></a>
            </td>
          </tr> 
          @endforeach()
        </tbody>
      </table>
    </div>
    <!-- <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer> -->
  </div>
</div>


@endsection
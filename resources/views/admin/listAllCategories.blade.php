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

<div class="table-agile-info" style="padding: 2px;">
  <div class="panel panel-default">
    <div class="panel-heading">
        QUẢN LÝ LOẠI SẢN PHẨM
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
        <a href="{{URL::to('addNewCategory')}}">
          <span style="color: white; background: #007075; padding: 10px 17px; border-radius: 5px;" class="fa fa-plus-circle">
          <p style="font-family:sans-serif; display: inline-block;">Thêm</p>
          </span>
        </a>
        <a href="{{URL::to('delete')}}">
          <span style="color:white;background:#c90002; padding: 10px 20px; border-radius: 5px;" class="fa fa-trash f11">
            <p style="font-family: sans-serif; display:inline-block;">Xóa</p>
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
        background: blue;
        color: white;
        transition: 400ms;
      }
      #abcd .f11:hover{
        background: darkred;
        color: white;
        transition: 400ms;
      }
    </style>
    
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
            <th>Tên loại sản phẩm</th>
            <th>Hiển thị</th>
            <th>Mô tả</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
            <!-- <th style="width:30px;"></th> -->
          </tr>
        </thead>
        <tbody>
          @foreach($Categories as $key => $catePro)


          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $catePro->CategoryName }}</td>
            <td><span class="text-ellipsis">
              
              <?php
                if($catePro->CategoryStatus == 0){
                  echo 'Ẩn';
                }else{
                  echo 'Hiển thị';
                }
              ?>

            </span></td>
            <td><span class="text-ellipsis">{{ $catePro->CategoryDescription }}</span></td>
            
            <td style="width: 100px;">
              <a href="{{URL::to('editCategoryProduct/'.$catePro->CategoryId)}}" class="active" ui-toggle-class="">
                <div style="width: 70px; font-size: 14px; text-align:center;padding-right:5px;" class="fa fa-pencil text-success text-active f1"> 
                  
                </div>
              </a>
            </td>
            <td style="width: 100px;">
              <a href="{{URL::to('deleteCategoryProduct/'.$catePro->CategoryId)}}" 
              onclick="return confirm('Bạn có chắc muốn xóa loại sản phẩm này không?')" class="active" ui-toggle-class="">
                <div style="width: 85px; font-size: 14px; text-align:center;padding-right:7px;" class="fa fa-trash text-danger text f2"> 
                  
                </div>
              </a>
            </td>
          </tr>
          @endforeach()
        </tbody>
      </table>
    </div>
    
  </div>
</div>


@endsection
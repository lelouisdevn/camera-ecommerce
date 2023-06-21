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
    background-color: #ff010b;
    color: white;
    padding-left: 10px;
  }
  .f2:hover {
    background-color: darkred;
    color: white;
  }
  .tooltiptext{
    width: 160px;
    top:100%;
    left:40%;
    margin-left: 80px;
  }
</style>

<div class="table-agile-info" style="padding: 2px;">
  <div class="panel panel-default">
    <div class="panel-heading">
        QUẢN LÝ SẢN PHẨM
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
      <a href="{{URL::to('addNewProduct')}}">
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

      <div class="col-sm-3" style="float: right;">
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
      table thead th {
        text-align: center;
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
            <!-- <th>ID</th> -->
            <th>Tên sản phẩm</th>

            <th>Mô tả</th>

            <th>Số lượng</th>
            <th>Hình ảnh</th>
            <th>Đơn giá</th>
            <!-- <th>Slider</th> -->
            <th>Trạng thái</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Product as $key => $pr)


          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <!-- <td>{{ $pr->ProductId }}</td> -->
            <td style="width:150px;text-align:center;">{{ $pr->ProductName }}</td>
            <td style="width:50%;text-align:justify;">{{ $pr->ProductDescription }}</td>
            <td style="width:100px; text-align:center;">{{ $pr->ProductQuantity }}</td>
            <td style="text-align:center;"><img src="/Uploads/Products/{{ $pr->ProductImage }}" width="75px;"></td>
            <td style="width:100px; text-align:center;">{{ $pr->ProductPrice }}</td>
            <!-- <td>
              <?php
              $slider = $pr->ProductSlider;
              if($slider==1){
                echo "Hiển thị";
              }else{
                echo "Ẩn";
              }
              ?>
            </td> -->
            <td style="width:100px; text-align:center;">
              <?php
                $status = $pr->ProductStatus;
                if($status==1){
                  echo "Hiển thị";
                }
                else echo "Ẩn";
              ?>
            </td>
            <td style="width: 100px;">
              <a href="{{URL::to('editProduct/'.$pr->ProductId)}}" class="active" ui-toggle-class="">
              <div style="width: 100px; text-align:center;padding-right:5px;" class="fa fa-pencil text-success text-active f1">
              </div></a>
              <a href="{{URL::to('deleteProduct/'.$pr->ProductId)}}"
              onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="active" ui-toggle-class="">
              <div style="width: 100px; text-align:center; padding-right:7px;" class="fa fa-trash text-danger text f2">
              </div></a>
            </td>
          </tr>
          @endforeach()
        </tbody>
      </table>
    </div>

    <footer class="panel-footer">

      <div class="row" style="text-align: center;">

        <div>
          {{ $Product->links() }}
        </div>


      </div>
    </footer>

  </div>
</div>


@endsection

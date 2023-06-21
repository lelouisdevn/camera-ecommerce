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
        QUẢN LÝ ĐƠN HÀNG
      </div>
    <div>
    
    <div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs" >
        <a href="{{URL::to('delete')}}" style="background: #c90002; padding: 10px 20px; color: white; border-radius: 5px;">
          <span class="fa fa-trash f11">
            <p style="font-family: sans-serif; display: inline-block;">Xóa</p>
          </span>
        </a>         
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{ URL::to('searchOrder') }}" method="get">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" class="input-sm form-control" value="{{ $OrderId }}" name="OrderId" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
            </span>
          </div>
        </form>
      </div>
      <div style="margin-top: 50px; margin-left: 20px; margin-bottom: 20px;" id="abcd">
    <style>
      #abcd span {
        background: red;
        padding: 10px;
        color: whitesmoke;
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
            <th>Mã đơn hàng</th>
            <th>Khách hàng</th>
            <th>Giá trị đơn hàng </th>
            <th>Trạng thái</th>
            <th style="width:30px;">Xem thêm</th>
            <th style="width:30px;">Xóa</th>
            <th>In</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Order as $key => $or)

          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $or->OrderId }}</td>
            <td>{{ $or->UserName }}</td>
            <td>{{ $or->OrderTotalPay }}</td>

<script>
  function submit() {
    }
</script>
            <td>
              <form action="{{URL::to('changeOrderStatus/'.$or->OrderId)}}" method="POST">
                {{csrf_field()}}
                <select style="padding: 4px; border-radius: 5px; border: grey solid 1px; " onchange="return submit()" name="abc">
                  <option>{{$or->OrderStatus}}</option>
                  <option value=1>Đang giao</option>
                  <option onclick="submit" value=2>Đã giao</option>
                  <option onclick="submit" value=3>Đang xử lý</option>
                </select>
              </form>
            </td>
            <td style="width: 100px;">
              <a href="{{URL::to('seeOrderDetail/'.$or->OrderId)}}" class="active" ui-toggle-class="">
              <div style="width: 100px; padding-left:45px;" class="fa fa-eye text-success text-active f1"></div></a>
            </td>
            <td  style="width: 100px;">
              <a href="{{URL::to('deleteOrder/'.$or->OrderId)}}" 
              onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')" class="active" ui-toggle-class="">
              <div style="width: 100px; padding-left: 45px;" class="fa fa-trash text-danger text f2"></div></a>
            </td>
            <td  style="width: 100px;">
              <a target="_blank;" href="{{URL::to('printOrder/'.$or->OrderId)}}" class="active" ui-toggle-class="">
              <div style="width: 100px; padding-left: 45px;" class="fa fa-print text-danger text f2"></div></a>
            </td>
          </tr>
          @endforeach()
        </tbody>
      </table>
    </div>
    
  </div>
</div>


@endsection
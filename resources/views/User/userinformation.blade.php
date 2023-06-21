@extends('User.userprofile')
@section('content')
<div style="width: 70%; margin: 0 auto;">
<div style="text-align:center; font-size: 18px; font-weight: bold; margin-top: 10px; margin-bottom: 30px;">
    Thông tin khách hàng
</div>
<style type="text/css">
    tr td input {
        border-radius: 5px;
        border: solid grey 1px;
    }
    tr>td {
        text-align: left;
    }
</style>
@foreach($UserInfo as $key => $ui)
<form action="{{URL::to('updateUserInfo')}}" method="POST" style="padding-bottom: 100px;">
    {{ csrf_field() }}
<div class="table_input">
    <table style="margin: 0 auto; width: 80%;">
        <input type="hidden" value="{{ $ui->UserId }}" name="UserId">
        <tr>
            <td>Tên của bạn:</td>
            <td style="width: 70%;"><input type="text" value="{{ $ui->UserName }}" name="name"></td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td style="width: 70%;"><input type="text" value="{{ $ui->UserPhoneNumber }}" name="number"></td>
        </tr>
        <!-- <tr>
            <td>Địa chỉ Email:</td>
            <td style="width: 70%;"><input type="text" value="{{ $ui->UserEmail }}" name="email"></td>
        </tr> -->
        <tr>
            <td>Địa chỉ nhà:</td>
            <td style="width: 70%;"><input type="text" value="{{ $ui->UserAddress }}" name="address"></td>
        </tr>
    </table>
</div>
<div style="margin-top: 20px;" class="btn_update">
    <button type="submit">Cập nhật</button>
</div>
<div style="margin-top: 10px;">
    <?php
                $message = Session::get('message');
                if($message){
                    echo $message;
                    Session::put('message', null);
                };
            ?>
</div>
<br>
<br>
</form>
</div>
@endforeach

@endsection
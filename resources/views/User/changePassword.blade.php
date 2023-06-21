@extends('User.userprofile')
 @section('content')
 <style>
    .container_profile {
        width: 70%;
        overflow: auto;
        margin: 0 auto;
        background: whitesmoke;
        font-size: 16px;
        height: auto;
    }
    .left-column {
        width: 20%;
        float: left;
        text-align: center;
        padding-right: 10px;
        
    }
    .left-column div {
        padding: 3px;
        margin: 2px;
    }
    .right-column {
        width: 79%;
        text-align: center;
        float: right;
        
        
    }
    .right-column input {
        width: 100%;
    }
    .btn_update button{
        background: green;
        padding: 10px 20px;
        border-radius: 7px;
        color: white;
        border: none;
    }
    .table_input input{
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        border: grey solid 1px;
        margin-top: 7px;

    }
    table tr {
        

    }
    table tr td {
        
    }
    .btnbtn {
        background: #5361b5;
        border: none;
        border-radius: 7px;
        padding: 7px 22px;
        color: white;
    }
    .btnbtn:hover {
        background: #1b3d9f;
        transition: 400ms;
        color: white;
    }
    .b1 {
        border-radius:7px;
        padding: 7px 22px;
        background: #5361b5;
        border: none;
        color: white;
    }
    .b1:hover {
        background: #414f9e;
    }
    .b2 {
        border: grey solid 1px;
        background: white;
    }
    .cancel {
        background: #02afae;
        color: white;
        padding:10px 22px 10px 22px;
    }
    .cancel:hover {
        background: #008c8a;
    }
</style>
<script src="{{URL::to('public/frontend/js/password.js')}}"></script>
<body>
    @foreach ($UserInfo as $key => $ui)
            <div style="text-align:center; font-size: 18px; font-weight: bold; margin-top: 10px; margin-bottom: 10px;">
                Cài đặt tài khoản
            </div>
            <div>
                <?php
                    $UserId = Session::get('UserId');
                ?>
                <form name="form" action="{{URL::to('saveNewPassword/'.$UserId)}}" method="POST" onsubmit="return validate()">
                {{ csrf_field() }}
                    <div class="table_input">
                        <div style="margin-bottom: 10px;">
                            Đổi mật khẩu
                        </div>
                        <div>
                            <table style="margin: 0 auto; width: 50%;">
                                <tr>
                                    <td>
                                        Mật khẩu mới:
                                    </td>
                                    <td>
                                        <input type="password" name="new_password" id="p1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nhập lại mật khẩu:
                                    </td>
                                    <td>
                                        <input onblur="checkName()" type="password" name="retype_password" id="p2">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <br/>
                        <!-- <button class="btnbtn" onchange=checkName() type="submit">Ok</button>
                        <span><a href="{{URL::to('settings/'.$UserId)}}" class="btnbtn cancel">Hủy</a></span> -->
                        <div>
                            <button type="submit" onchange=checkName() class="btn btn-info b1">Cập nhật</button>
                                <a href="{{ URL::to('settings/'.$UserId) }}">
                                    <span text="text" class="btn btn-info b2" style="background:whitesmoke; color:black;">
                                        Hủy
                                    </span>
                                </a>
                        </div>
                    </div>
                </form>
                <br><br><br><br><br><br>
            </div>
    @endforeach
@endsection
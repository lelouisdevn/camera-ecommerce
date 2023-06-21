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
    .table_input div{
        margin: 1px;
        padding: 10px;
        background: cornflowerblue;
        color: white;
        width: 40%;
        border-radius: 7px;
        margin-bottom: 5px;
        text-align: center;
        margin: 0 auto;
    }
</style>

<body>
    @foreach ($UserInfo as $key => $ui)
    
            <div style="text-align:center; font-size: 18px; font-weight: bold; margin-top: 10px; margin-bottom: 10px;">
                Cài đặt tài khoản
            </div>
            <div>
                <div class="table_input">
                    <a href="{{URL::to('/changePassword/'.$ui->UserId)}}"><div style="margin-bottom: 15px;">Đổi mật khẩu</div></a>
                    <a onclick="return confirm ('Bạn đang chuẩn bị xóa tài khoản của mình? Mọi dữ liệu của bạn sẽ được xóa khỏi hệ thống!')" 
                    href="{{URL::to('/deleteAccount/'.$ui->UserId)}}"><div>Xóa tài khoản</div></a>
                </div>
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
            <br/>
            <br/>
            <br/>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br>
    @endforeach
</body>

@endsection
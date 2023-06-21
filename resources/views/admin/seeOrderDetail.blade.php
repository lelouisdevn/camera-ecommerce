@extends('adminLayout')
@section('dashboard')

<style type="text/css">
    .abc {
        margin: 0 20px;
        text-align: center;
    }

    .abc div button {
        text-align: right;
        margin-top:  10px;
        padding: 10px 15px;
        background-color: #ff7168;
        border-radius: 5px;
        border: 0;
        color: white;
    }

    .abc div button:hover {
        background-color: #36c590;
        color: white;
        transition: 400ms;
    }
    .container1{
        border-top: black solid 2px;
    }
     .left {
        float:  left;
        width:  18%;
        margin: 10px 0;
        border-right: black solid 2px;
        height: auto;
        border-bottom: black solid 2px;
        margin-left: -15px;
        position: sticky;
        top: 100px;
    }

     .right {
        float: right;
        width: 82%;
    }

    .right11 {
        float: right;
        width: 80%;
    }
    .center1{
        padding-left: 20px;
    }
    .center1 ul {
        border-bottom: black solid 2px;
        margin-right: 5px;
        padding-top: 5px;
        padding-left: 0;
        padding-bottom: 5px;
    }

    .center1 ul:last-child {
        border-bottom: none;
    }

    .center1 ul li {
        padding: 7px;
        font-size: 17px;
        border-radius: 5px;
        font-weight: 400;
        font-family: sans-serif;
        margin-right: 5px;
        margin-bottom: 10px;
    }
    .center1 ul li:hover {
        background-color: black;
        color:  white;
        padding-left: 15px;
        transition: 500ms;
    }
    .center1 {
        margin-left: 0;
    }
    .center1 a{
        color: black;
        font-size: 17px;
    }
    .center1 a:hover{
        color: white;
    }
    .center1 h4{
        font-size: 20px;
        font-family: sans-serif;
        font-weight: bold;
    }

    .left .title{
        background-color: black;
        margin-left: -15px;
        padding: 10px;
        color:  white;
    }
 
    .right .product {
        margin-left: 10px;
        margin-top: 15px;
    }
    .right .title {
        background-color: black;
        color: white;
        padding: 10px;
        margin: 10px 0 0 10px;
        }

    .col1{
        float: left;
        width: 30%;
        border: whitesmoke solid 1px;
        margin-right: 20px;
        margin-left: 25px;
        padding: 10px 10px 20px 10px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .cart1 a{
        color: white;
        font-size: 16px;
        font-family: sans-serif;
    }

    .product .col1 .cart1 {
        background-color: #5361b5;
        margin: 20px 0 0 0;
        padding: 10px;
        text-align: center;
        font-size: 16px;
        border-radius: 5px;
    }
    
    .product .col1 .cart1:hover{
        background-color: black;
        color: white;
        transition: 500ms;
    }


    /*.product .col1 .cart1 a {
        color: black;
    }
    .product .col1 .cart1 a:hover{
        color: white;
    }*/
    .product .col1 img {
        margin: 0 90px;
        width: 250px;
        height: 250px;
    }
    .product .col1 img:hover {
        border-image: black solid 1px;
        transition: 400ms;
    }
    .container2{
        overflow: auto;
        width: 100%;
        margin-top: 10px;
    }

    .left1 {
        float: left;
        width: 40%;
        color: black;
        font-size: 16px;
    }

    .right1 {
        float: right;
        width: 60%;
        text-align: right;
        font-size: 20px;
        color: black;
    }

    .container1{
        border-top: black solid 2px;
    }
    .container1 .left {
        float:  left;
        width:  18%;
        margin: 10px 0;
        border-right: black solid 2px;
        height: auto;
        border-bottom: black solid 2px;
        margin-left: -15px;
    }

    .container1 .right {
        float: right;
        width: 82%;
    }

    .center1{
        padding-left: 20px;
    }
    .center1 ul {
        border-bottom: black solid 2px;
        margin-right: 5px;
        padding-top: 5px;
        padding-left: 0;
        padding-bottom: 5px;
    }

    .center1 ul:last-child {
        border-bottom: none;
    }

    .center1 ul li {
        padding: 7px;
        font-size: 17px;
        border-radius: 5px;
        font-weight: 400;
        font-family: sans-serif;
        margin-right: 5px;
        margin-bottom: 10px;
    }
    .center1 ul li:hover {
        background-color: black;
        color:  white;
        padding-left: 15px;
        transition: 500ms;
    }
    .center1 {
        margin-left: 0;
    }
    .center1 a{
        color: black;
        font-size: 17px;
    }
    .center1 a:hover{
        color: white;
    }
    .center1 h4{
        font-size: 20px;
        font-family: sans-serif;
        font-weight: bold;
    }

    .left .title{
        background-color: black;
        margin-left: -15px;
        padding: 10px;
        color:  white;
    }


    .right .product {
        margin-left: 10px;
        margin-top: 15px;
    }
    .right .title {
        background-color: black;
        color: white;
        padding: 10px;
        margin: 10px 0 0 10px;
        }

    .col1{
        float: left;
        width: 30%;
        border: whitesmoke solid 1px;
        margin-right: 20px;
        margin-left: 25px;
        padding: 10px 10px 20px 10px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .cart1 a{
        color: white;
        font-size: 16px;
        font-family: sans-serif;
    }

    .product .col1 .cart1 {
        background-color: cornflowerblue;
        margin: 20px 0 0 0;
        padding: 10px;
        text-align: center;
        font-size: 16px;
        border-radius: 5px;
    }

    .product .col1 .cart1:hover{
        background-color: black;
        color: white;
        transition: 500ms;
    }


    /*.product .col1 .cart1 a {
        color: black;
    }
    .product .col1 .cart1 a:hover{
        color: white;
    }*/
    .product .col1 img {
        margin: 0 90px;
        width: 250px;
        height: 250px;
    }
    .product .col1 img:hover {
        border-image: black solid 1px;
        transition: 400ms;
    }
    .container2{
        overflow: auto;
        width: 100%;
        margin-top: 10px;
    }

    .left1 {
        float: left;
        width: 40%;
        color: black;
        font-size: 16px;
    }

    .right1 {
        float: right;
        width: 60%;
        text-align: right;
        font-size: 20px;
        color: black;
    }

    .centt img {
        margin: 0 auto;
        width: 100%;
    }

    .button1a {
        padding: 7px 14px;
        background-color: #5361b5;
        color: white;
        border-radius: 5px;
        border: 0px;

    }
    .button1a:hover {
        background-color: black;
        color: white;
        border-radius: 5px;
        transition: 400ms;
    }
    .pyssurt {
      font-size: 60px;
      text-align: center;
      font-family: FreeMono;
      font-weight: 700;
      color: #0165b9;
    }
    .pyssurt1 {
        font-size: 20px;
        padding-top: -10px;
        padding-bottom: 10px;
    }
    .bang {
        width: 100%;
        border: whitesmoke; solid 1px;
        background-color: whitesmoke;
        font-size: 14px;
    }
    .bang .hang {
        background-color: #337ab7;
        /* border: #ff7168 solid 1px; */
        text-align: center;
        color: white;
    }

    .bang td {
        padding: 5px;
        /* border: black solid 1px; */
    }

    .nut {
        padding: 10px 20px;
        background-color: #5361b5;
        border-radius: 5px;
        border: 0;
        color: white;
        font-size:16px;
        margin-top: 10px;
    }
    .nut:hover {
        background-color: black;
        color: whitesmoke;
        transition: 400ms;
    }
    
</style>

    <section >
        <div class="abc">
            <div>
               <table class="bang">
                    <tr style="">
                        <td colspan="6" style="border: none; font-size: 20px; padding-bottom: 10px;">CHI TIẾT ĐƠN HÀNG</td>
                    </tr>
                    <tr class="hang">
                        <td>Hình ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Đơn giá</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                    </tr>
                    @foreach($detail as $dt)
                    <tr>
                        <td style="width: 10%;"><img width="100px" height="100px" src="{{URL::to('public/Uploads/Products/'.$dt->ProductImage)}}" /></td>
                        <td>{{ $dt->ProductName }}</td>
                        <td>{{ $dt->ProductPrice }}</td>
                        <td>{{ $dt->Product_sale_quantity }}</td>
                        <td>
                            <?php
                                $a = $dt->ProductPrice;
                                $b = $dt->Product_sale_quantity;
                                $total = $a * $b;
                                echo "$total";
                            ?>
                        </td>
                    </tr>
                    @endforeach               
                    
<style type="text/css">
    .container1a {
        border: whitesmoke solid 1px;
        float: left;
        width: 100%;
        margin-bottom: 20px;
    }
    .container1a .left1a {
        width: 49%;
        float: left;
        padding: 2px;
    }

    .container1a .right1a {
        width: 49%;
        float: right;
        padding: 2px;
    }
    .container1a input {
        width: 100%;
    }
    .container1a .bang td {
        text-align: left;
    }
    .container1a .bang1 tr td input {
        width: 10%;
    }
    .bang1 {
        width: 60%;
        border: whitesmoke solid 1px;
        background-color: whitesmoke;
        margin-top: 20px;
        font-size: 14px;
    }
    .bang1 {
        width: 100%;
        border: whitesmoke; solid 1px;
        background-color: whitesmoke;
        margin-top: 20px;
        font-size: 14px;
    }
    .bang1 .hang1 {
        background-color: #ff7168;
        /* border: #ff7168 solid 1px; */
        text-align: center;
        color: white;
    }

    .bang1 td {
        padding: 5px;
        /* border: black solid 1px; */
    }
</style>


                </table>
                <!-- <form> -->
                <div class="container1a">
                    
                    <div class="left1a">
                        @foreach ($Order as $or)
                        <table class="bang">
                            <tr class="hang">
                                <td style="text-align: center;" colspan="2">THÔNG TIN VẬN CHUYỂN</td>
                            </tr>
                            <tr>
                                <td>Khách hàng:</td>
                                <td>
                                    
                                    {{ $or->OrderName }}

                                </td>
                            </tr>
                            <tr>
                                <td>Số điện thoại:</td>
                                <td>
                                    
                                    {{ $or->OrderPhoneNumber }}

                                </td>
                            </tr>

                            <tr>
                                <td>Địa chỉ:</td>
                                <td>
                                    {{ $or->OrderReceivingPlace }}
                                </td>
                            </tr>
						</table>
                    </div>
                    <div class="right1a">
                        <table class="bang">
                            <?php
                                $tong = 0;
                                $fee = 2;
								$total1 = 0;
                            ?>
                            <tr class="hang">
                                <td style="text-align: center;" colspan="2">THÔNG TIN ĐẶT HÀNG</td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">Phí vận chuyển:</td>
                                <td style="text-align: right;">
                                    <?php
                                        $gia = $or->ShippingFee;
                                        $gia1 = number_format($gia);
                                        echo "$gia1"." £";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">Tổng cộng:</td>
                                <td style="text-align: right;">                           
                                    <?php
                                        $gia = $or->OrderTotalPay;
                                        // $gia1 = number_format($gia);
                                        echo "$gia"." £";
                                    ?>
                                </td>
                            </tr>
                            @foreach($payment as $p)
                            <tr>
                                <td style="text-align: right;">Thanh toán bằng:</td>
                                <td style="text-align: right;">
                                    <?php
                                        $value = $p->Payment_Method;
                                        if($value == 1){
                                            echo "Thẻ ghi nợ";
                                        }
                                        elseif($value == 2){
                                            echo "Tiền mặt";
                                        }else echo "Momo";
                                    ?>                        
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
					@endforeach
                </div>
                
            <div>
        </div>

    </section>

<style type="text/css">
    .taskbar {
        padding-top: 20px;
    }
    .taskbar div {
        display: inline-block;
        font-size:  16px;
        padding: 10px 20px;
        margin-right: 5px;
        background-color: #337ab7;
        border-radius: 5px;
        color: white;
        text-align: center;
    }
    .taskbar div:hover {
        background: #1b3d9f;
        transition: 400ms;
    }
</style>

    <!-- <div class="taskbar" style="text-align: center;">
        <a href="{{ URL::to('manageOrder') }}"><div>Quay về</div></a>
        <a href="{{URL::to('printOrder/'.$or->OrderId)}}" target="_blank"><div class="printbtn">In</div></a>
    </div> -->
    <div style="text-align:center;">
        <a href="{{ URL::to('printOrder/'.$or->OrderId) }}">
            <span class="btn btn-info" style="background: #337ab7">In đơn hàng</span>
        </a>
        <a href="{{ url()->previous() }}">
            <span text="text" class="btn btn-info" style="background:whitesmoke; color:black;">Quay lại</span>
        </a>
    </div>
    





    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>

@endsection
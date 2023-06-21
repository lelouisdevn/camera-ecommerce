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
    .left-column a{
        text-decoration: none;
        color: black;
    }
    .left-column div {
        padding: 3px;
        margin: 2px;
    }
    .right-column {
        width: 79%;
        text-align: center;
        float: right;
        border-left: black solid 1px;
        
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
        margin: 1px;
        padding: 5px;
    }
</style>

<body>
    @foreach ($UserInfo as $key => $ui)
    
            <div style="text-align:center; font-size: 18px; font-weight: bold; margin-top: 10px; margin-bottom: 30px;">
                Lịch sử đơn hàng
            </div>
            <div style="align: center;">
                <?php
                    $message = Session::get('message');
                    if($message){
                    echo $message;
                    Session::put('message', null);
                    };
                ?>
            </div>
            <br>
            @foreach($Orders as $key => $or)
            <div class="bangtt">
                <table style="margin: 0 auto; width:70%; background: #e6e6e6;">
                    <tr>
                        <td>Mã đơn hàng:</td>
                        <td>{{ $or->OrderId }}</td>
                        <?php
                            if($or->OrderStatus == "Đang xử lý"){
                        ?>
                            <td colspan="3" style="text-align:right; padding-right:5px; padding-top:5px;">
                                <a style="color:black;" href="{{URL::to('cancelOrder/'.$or->OrderId)}}">Hủy đơn hàng</a>
                            </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>Đặt vào: </td>
                        <td>{{ $or->OrderTime }} </td>
                        <td>{{ $or->OrderStatus }}</td>
                    </tr>
                    <tr style="background: #fe726b; color: white;">
                        <td>HÌnh ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Số lượng</td>
                        <td>Đơn giá</td>
                        <td>Tổng cộng</td>
                    </tr>
                    <?php
                        $shipping = 0;
                    ?>
                    <?php
                        $OrderId = $or->OrderId;
                        $orderDetail = DB::table('tbl_order_detail')->join('tbl_product', 'tbl_product.ProductId', '=', 'tbl_order_detail.ProductId')
                        ->where('tbl_order_detail.OrderId', $OrderId)->get();

                    foreach($orderDetail as $key => $de){
                    ?>
                    <tr>
                        <td><a href="{{URL::to('ProductDetail/'.$de->ProductId)}}"><img width="100px;" src="{{asset('public/Uploads/Products/'.$de->ProductImage)}}" alt=""></a></td>
                        <td>{{ $de->ProductName }}</td>
                        <td>{{ $de->Product_sale_quantity }}</td>
                        <td>{{ $de->ProductPrice }}</td>
                        <td>
                            <?php
                                $a = $de->Product_sale_quantity;
                                $b = $de->ProductPrice;
                                $c = $a * $b;
                                $shipping += $c;
                                $d = number_format($c);
                                echo "$d"." £";
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td>Phí vận chuyển:</td>
                        <td>
                           {{ $or->ShippingFee }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng thanh toán: </td>
                        <td>{{ $or->OrderTotalPay }}</td>
                    </tr>
                </table>
            <div>
                <br/>
                <br/>
                <br/>
                
            @endforeach

    @endforeach
</body>

@endsection
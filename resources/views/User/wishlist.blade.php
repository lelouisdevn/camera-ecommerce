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

            <div style="text-align:center; font-size: 18px; font-weight: bold; margin-top: 10px; margin-bottom: 30px;">
                Sản phẩm yêu thích
            </div>

            @foreach($WishlistInfo as $key => $wi)
            <form method="POST" action="{{URL::to('saveToCart1')}}">
                {{ csrf_field() }}
            <div class="bangtt">
                <table style="margin: 0 auto; width:70%; background: #e6e6e6;">
                    <tr>
                        <td height="110px;" width="250px;" style="text-align: left;"><a href="{{URL::to('ProductDetail/'.$wi->ProductId)}}"><img width="100px;" height="100px;" src="{{asset('/Uploads/Products/'.$wi->ProductImage)}}"></a></td>
                        <td width="250px;" style="text-align: left;">{{$wi->ProductName}}</td>
                        <td style="text-align: left;" width="75px">
                            <input type="hidden" name="ProductQuantity" value="1">
                            <input type="hidden" name="ProductId_Hidden" value="{{$wi->ProductId}}">
                            <?php
                            $UserId = Session::get('UserId');
                            $get = DB::table('tbl_wishlist')->where('ProductId', $wi->ProductId)->where('UserId',$UserId)->first();
                                if($get){
                            ?>
                            <span><a href="{{URL::to('removeFromWishlist1/'.$wi->ProductId)}}" style="color: red;" class="fa fa-heart"></a></span>
                            <?php
                            }else{
                            ?>
                            <span><a href="{{URL::to('addToWishlist/'.$wi->ProductId)}}" style="color: red;" class="fa fa-heart-o"></a></span>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                            <button style="padding: 5px 20px; background: #5361b5;
                            color: white; border-radius: 5px; border: none;">
                            <i class="fa fa-shopping-cart" ></i> Mua</button>
                        </td>
                    </tr>
                </table>
            <div>
            </form>
            @endforeach
                <br/>
                <br/>
                <br/>

@endsection

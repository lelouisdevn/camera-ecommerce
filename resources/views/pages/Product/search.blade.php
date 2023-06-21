@extends('home')
 @section('content')


        <div class="title">
            <center><h4>SẢN PHẨM</h4></center>
        </div>

         @foreach ( $Product as $key => $pr)
        <a href="{{URL::to('/ProductDetail/'.$pr->ProductId)}}">
            <div class="product">
                <div class="col1">
                    <div>
                        <img src="{{URL::to('/Uploads/Products/'.$pr->ProductImage)}}">
                    </div>
                    <div class="container2">
                        <div class="left1">
                            {{ number_format($pr->ProductPrice).' £' }}
                        </div>
                        <div class="right1">
                            {{ $pr->ProductName }}
                        </div>
                    </div>
                    <div class="cart1">
                        <span class="fa fa-shopping-cart"><a href="{{URL::to('/ProductDetail/'.$pr->ProductId)}}"> Xem sản phẩm</a></span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        <div style="text-align:center;">
            {{ $Product->links() }}
        </div>
@endsection

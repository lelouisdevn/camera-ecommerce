 @extends('home')
 @section('content')



        @foreach ( $TrademarkName as $key => $trm)
        <div class="title">
            <center><h4 style="font-size:17px;">{{ $trm->TrademarkName }}</h4></center>
        </div>
        @endforeach
        @foreach ($Product as $key => $pr)
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

        <div class="row">
            <div class="col-sm-7 text-right text-center-xs" style="margin-top: 55px;">
            {{ $Product->links() }}
            </div>
        </div>
@endsection

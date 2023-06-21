@extends('adminLayout')
@section('dashboard')

<div style="background: #337ab7; padding: 10px; font-size: 20px; margin: 0px; border-radius: 5px 5px 0 0; text-align:center; margin-top:-40px;">
    SẢN PHẨM BÁN CHẠY
</div>
<br/>
<br/>
@foreach($Get as $key => $ge )
<span style="display: inline-block; margin-right: 10px;">
    <a href="{{URL::to('ProductDetail/'.$ge->ProductId)}}">
        <img style="display: inline-block;" width="310px;" height="310px;" src="{{asset('/Uploads/Products/'.$ge->ProductImage)}}" alt="">
    </a>
    <div style="width: 90%; overflow: auto; margin: 10px auto 5px auto;">
        <p style="font-size: 16px;">{{ $ge->ProductName }}</p>
        <span style="float: left; width: 50%; border-radius: 5px 0 0 5px;; background: #ff7168; text-align: center; font-size: 17px;">
            Đã bán: {{ $ge->ProductSaled }}
        </span>
        <span style="float: right; width: 50%; border-radius: 0 5px 5px 0; background: #5188ca; text-align: center; font-size: 17px;">
            Còn: {{ $ge->ProductQuantity }}
        </span>
    </div>
</span>
@endforeach


@endsection

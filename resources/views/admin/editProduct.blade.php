@extends('adminLayout')
@section('dashboard')

<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                        @foreach($Product as $key => $editValue)
                        
                        
                        <div class="panel-body">
                            <div class="position-center">

                                 <!-- <a href="{{URL::to('editProductDetail/'.$editValue->ProductId)}}" class="active" ui-toggle-class="">
                                    <div style="width: 100px; text-align:center;padding-right:5px; background:grey;" class="fa fa-pencil-square-o text-success text-active f1"></div>
                                </a> -->
                                <div style="margin-bottom:10px;">
                                    Chỉnh sửa chi tiết sản phẩm <a href="{{URL::to('editProductDetail/'.$editValue->ProductId)}}">
                                        <span style="padding:5px 7px; background:#007075;border-radius: 5px; color:white;"><i class="fa fa-pencil-square-o"></i></span></a>
                                </div>

                                <form role="form" method="POST" action="{{URL::to('updateProduct/'.$editValue->ProductId)}}">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" value="{{ $editValue->ProductName }}" name="ProductName"  class="form-control" id="exampleInputEmail1" placeholder="Nhap ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input type="text" value="{{ $editValue->ProductDescription }}" name="ProductDescription"  class="form-control" id="exampleInputEmail1" placeholder="Nhap ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea  style="resize: none;" rows=10; name="ProductContent" class="form-control" 
                                    id="ckeditor1" placeholder="Nhap mo ta danh muc">{{ $editValue->ProductContent }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" value="{{ $editValue->ProductImage }}" name="ProductImage"  class="form-control" id="exampleInputEmail1" placeholder="Tai len hinh anh">
                                    <img src="{{URL::to('public/Uploads/Products/'.$editValue->ProductImage)}}" width="300px" height="300px;">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" value="{{ $editValue->ProductQuantity }}" name="ProductQuantity"  class="form-control" id="exampleInputEmail1" placeholder="Nhap ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đơn giá</label>
                                    <input type="text" value="{{ $editValue->ProductPrice }}" name="ProductPrice"  class="form-control" id="exampleInputEmail1" placeholder="Nhap ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                    <select name="TrademarkId" class="form-control input-sm m-bot15">
                                        @foreach ($trademark as $key => $tr)
                                            @if( $tr->TrademarkId == $editValue->TrademarkId)
                                                <option selected value="{{$tr->TrademarkId}}">{{$tr->TrademarkName}}</option>
                                            @else                                                                                       
                                                <option value="{{$editValue->TrademarkId}}">{{$tr->TrademarkName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Loại sản phẩm</label>
                                    <select name="CategoryId" class="form-control input-sm m-bot15">
                                        @foreach ($product as $key => $pr)
                                            @if ( $pr->CategoryId == $editValue->CategoryId)
                                                <option selected value="{{$pr->CategoryId}}">{{$pr->CategoryName}}</option>
                                            @else
                                                <option value="{{$pr->CategoryId}}">{{$pr->CategoryName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <select name="ProductStatus" class="form-control input-sm m-bot15">
                                        <option selected value='1'>Hiện</option>
                                        <option value='0'>Ẩn</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" name="SliderAdd" class="btn btn-info">Cập nhật</button>
                                    <a href="{{ URL::to('listAllProduct') }}">
                                        <span text="text" class="btn btn-info" 
                                        style="background:whitesmoke; color:black;">Hủy</span>
                                    </a>
                                </div>
                            </form>
                            </div>

                        </div>
                        @endforeach
                    </section>

            </div>

@endsection
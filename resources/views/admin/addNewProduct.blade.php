

@extends('adminLayout')
@section('dashboard')

<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm mới
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" enctype="multipart/form-data" action="{{URL::to('saveProduct')}}">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="ProductName"  class="form-control" id="exampleInputEmail1" placeholder="Enter a product name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input type="text" name="ProductDescription"  class="form-control" id="exampleInputEmail1" placeholder="Enter description of the product">
                                </div>                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: none;" rows=10; name="ProductContent" class="form-control" id="ckeditor1" placeholder="Enter Content of A Product"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="ProductImage"  class="form-control" id="exampleInputEmail1" placeholder="Upload an image file">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" name="ProductQuantity"  class="form-control" id="exampleInputEmail1" placeholder="Enter the number of products">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đơn giá</label>
                                    <input type="text" name="ProductPrice"  class="form-control" id="exampleInputEmail1" placeholder="Enter the price of the product">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                    <select name="TrademarkId" class="form-control input-sm m-bot15">
                                        @foreach ($trademark as $key => $tr)

                                        <option value="{{$tr->TrademarkId}}">{{$tr->TrademarkName}}</option>
                                        
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Loại sản phẩm</label>
                                    <select name="CategoryId" class="form-control input-sm m-bot15">
                                        @foreach ($product as $key => $pr)

                                        <option value="{{$pr->CategoryId}}">{{$pr->CategoryName}}</option>
                                        
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">HIển thị</label>
                                    <select name="ProductStatus" class="form-control input-sm m-bot15">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="SliderAdd" class="btn btn-info">Thêm</button>
                                    <a href="{{ url()->previous() }}">
                                        <span text="text" class="btn btn-info" style="background:whitesmoke; color:black;">
                                            Hủy
                                        </span>
                                    </a>
                                <div style="align: center;">
                                    <?php
                                        $message = Session::get('message');
                                        if($message){
                                            echo $message;
                                            Session::put('message', null);
                                        };
                                    ?>
                                </div>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

@endsection
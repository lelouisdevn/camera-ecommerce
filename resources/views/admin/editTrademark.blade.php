@extends('adminLayout')
@section('dashboard')

<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thương hiệu sản phẩm
                        </header>
                        @foreach($Trademark as $key => $editValue)
                        <div class="panel-body">
                            <div class="position-center">

                                 

                                <form role="form" method="POST" action="{{URL::to('updateTrademark/'.$editValue->TrademarkId)}}">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{ $editValue->TrademarkName }}" name="TrademarkName"  class="form-control" id="exampleInputEmail1" placeholder="Nhap ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea  style="resize: none;" rows=10; name="TrademarkDescription" class="form-control" id="exampleInputPassword1" placeholder="Nhap mo ta danh muc">{{ $editValue->TrademarkDescription }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">HIển thị</label>
                                    <select name="ProductStatus" class="form-control input-sm m-bot15">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="SliderAdd" class="btn btn-info">Cập nhật</button>
                                <a href="{{ url()->previous() }}">
                                    <span text="text" class="btn btn-info" style="background:whitesmoke; color:black;">
                                            Hủy
                                    </span>
                                </a>
                            </form>
                            </div>

                        </div>
                        @endforeach
                    </section>

            </div>

@endsection
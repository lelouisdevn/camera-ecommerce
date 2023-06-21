@extends('adminLayout')
@section('dashboard')
<style>
    .button_cancel {
        background: #007075;
        border-radius: 5px;
        padding: 10px;
        padding-bottom: 13px;
        color: white;
    }
    .button_cancel:hover {
        background: #008c8a;
        transition: 400ms;
    }
    .nutt:hover {
        background: #152c81;
        transition: 400ms;
    }
</style>
<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật loại sản phẩm
                        </header>
                        @foreach($Categories as $key => $editValue) 
                        <div class="panel-body">
                            <div class="position-center">

                                 

                                <form role="form" method="POST" action="{{URL::to('updateCategory/'.$editValue->CategoryId)}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                                        <input type="text" value="{{ $editValue->CategoryName }}" name="CategoryName"  class="form-control" id="exampleInputEmail1" placeholder="Nhap ten danh muc">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả</label>
                                        <textarea  style="resize: none;" rows=10; name="CategoryDescription" class="form-control" id="exampleInputPassword1" placeholder="Nhap mo ta danh muc">{{ $editValue->CategoryDescription }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">HIển thị</label>
                                        <select name="ProductStatus" class="form-control input-sm m-bot15">
                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                                    <div>
                                        <button type="submit" name="SliderAdd" class="btn btn-info">Cập nhật</button>
                                        <a href="{{ url()->previous() }}">
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
        </div>

@endsection 
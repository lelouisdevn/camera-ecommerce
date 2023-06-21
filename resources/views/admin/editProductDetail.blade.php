@extends('adminLayout')
@section('dashboard')
<style type="text/css">
    .abc {
        font-size: 19px;
        
    }
</style>
<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật chi tiết sản phẩm
                        </header>
                        @foreach($Product as $key => $editValue)
                        <div class="panel-body">
                            <div class="position-center">

                                 

                            <form role="form" method="POST" action="{{URL::to('updateProductDetail/'.$editValue->ProductId)}}">
                                    {{ csrf_field() }}
                                <div>
                                    <span class="abc">Product: {{ $editValue->ProductId }}</span>
                                    <span> - </span>
                                    <span class="abc">{{ $editValue->ProductName }}</span>
                                    <div>
                                        <img width="100px" height="100px" src="{{ URL::to('public/Uploads/Products/'.$editValue->ProductImage) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kích thước</label>
                                    <input type="text" value="{{ $editValue->size }}" name="size"  class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trọng lượng</label>
                                    <input type="text" value="{{ $editValue->weight }}" name="weight"  class="form-control" id="exampleInputEmail1" placeholder="Nhap ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Dung lượng pin</label>
                                    <input type="text" value="{{ $editValue->battery }}" name="battery" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Độ phân giải</label>
                                    <input type="text" value="{{ $editValue->resolution }}" name="resolution"  class="form-control" id="exampleInputEmail1">
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tỉ lệ khung hình/giây</label>
                                    <input type="text" value="{{ $editValue->fps }}" name="fps"  class="form-control" id="exampleInputEmail1">
                                </div style="display:inline-block;">
                                <div>
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

                        </div>
                        @endforeach
                    </section>

            </div>

@endsection
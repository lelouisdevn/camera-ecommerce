

@extends('adminLayout')
@section('dashboard')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm chi tiết sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" enctype="multipart/form-data" action="{{URL::to('saveDetail/'.$ProductId)}}">
                                    {{ csrf_field() }}
                                 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã sản phẩm:</label>
                                <input type="text" name="ProductId"  class="form-control" id="exampleInputEmail1" value="{{ $ProductId }}">
                                </div>     
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kích thước:</label>
                                    <input type="text" name="size"  class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trọng lượng:</label>
                                    <input type="text" name="weight"  class="form-control" id="exampleInputEmail1">
                                </div>                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dung lượng pin:</label>
                                    <input type="text" name="battery"  class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Độ phân giải:</label>
                                    <input type="text" name="resolution"  class="form-control" id="exampleInputEmail1">
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tỉ lệ khung hình/giây:</label>
                                    <input type="text" name="fps"  class="form-control" id="exampleInputEmail1">
                                </div> 
                               
                               
                                
                                <button type="submit" name="SliderAdd" class="btn btn-info">Thêm</button>
                                    <a href="{{ url()->previous() }}">
                                        <span text="text" class="btn btn-info" style="background:whitesmoke; color:black;">
                                            Hủy
                                        </span>
                                    </a>
                                
                                </form>
                            </div>

                        </div>
                    </section>

            </div>

@endsection
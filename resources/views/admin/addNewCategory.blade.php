@extends('adminLayout')
@section('dashboard')

<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm loại sản phẩm mới
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{URL::to('saveCategory')}}">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                                    <input type="text" name="CategoryName"  class="form-control" id="exampleInputEmail1" placeholder="Nhap ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none;" rows=10; name="CategoryDescription" class="form-control" id="exampleInputPassword1" placeholder="Nhap mo ta danh muc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="CategoryStatus" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" name="SliderAdd" class="btn btn-info">Thêm</button>
                                <a href="{{ url()->previous() }}">
                                    <span text="text" class="btn btn-info" style="background:whitesmoke; color:black;">
                                    Hủy</span>
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
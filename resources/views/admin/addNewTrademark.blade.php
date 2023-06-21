

@extends('adminLayout')
@section('dashboard')

<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{URL::to('saveTrademark')}}">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="TrademarkName"  class="form-control" id="exampleInputEmail1" placeholder="Enter a brand name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none;" rows=10; name="TrademarkDescription" class="form-control" id="exampleInputPassword1" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="TrademarkStatus" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
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
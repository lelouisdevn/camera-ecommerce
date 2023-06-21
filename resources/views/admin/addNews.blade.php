

@extends('adminLayout')
@section('dashboard')

<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm bài viết mới
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                            <form role="form" method="POST" enctype="multipart/form-data" action="{{URL::to('saveNews')}}">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name="NewsTitle"  class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea id="ckeditor" style="resize: none;" rows=10; name="NewsContent" class="form-control" id="exampleInputPassword1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="NewsImage"  class="form-control" id="exampleInputEmail1" placeholder="Upload an image file">
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
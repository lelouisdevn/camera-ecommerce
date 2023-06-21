@extends('adminLayout')
@section('dashboard')

<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật bài viết
                        </header>
                        @foreach($News as $key => $ne)
                        <div class="panel-body">
                            <div class="position-center">



                                <form role="form" method="POST" action="{{URL::to('updateNews/'.$ne->NewsId)}}">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                                    <input type="text" value="{{ $ne->NewsTitle }}" name="NewsTitle"  class="form-control" id="exampleInputEmail1" placeholder="Nhap ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea id="ckeditor1" style="resize: none;" rows=18; name="NewsContent" class="form-control" id="exampleInputPassword1" placeholder="Nhap mo ta danh muc">{{ $ne->NewsContent }}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" value="{{ $ne->NewsImage }}" name="NewsImage"  class="form-control" id="exampleInputEmail1" placeholder="Tai len hinh anh">
                                    <br>
                                    <img src="{{URL::to('/Uploads/News/'.$ne->NewsImage)}}" width="300px">
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

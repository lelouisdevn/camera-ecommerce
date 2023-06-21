

@extends('adminLayout')
@section('dashboard')

<div class="row" style="margin-top:-40px;">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm slider sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <!-- <form role="form" method="POST" action="{{URL::to('saveSlider')}}">
                                    {{ csrf_field() }} -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">ID sản phẩm</label>
                                    <input type="text" name="ProductId"  class="form-control" id="exampleInputEmail1" placeholder="Enter a brand name">
                                </div>
                                <div>
                                    <button type="submit" name="SliderAdd" class="btn btn-info">Thêm</button>
                                    <a href="{{ url()->previous() }}">
                                        <span text="text" class="btn btn-info" 
                                        style="background:whitesmoke; color:black;">Hủy</span>
                                    </a>
                                </div> -->
                                <div style="width: 50%; overflow-x: hidden; overflow-y: auto; height: 500px; margin: 0 auto;">
                                <table style="width: 100%;">
                                    @foreach ($Info as $key => $info)
                                    <!-- <div>
                                        <img width="75px" height="75px" src="{{asset('public/Uploads/Products/'.$info->ProductImage)}}" alt="">
                                        <span>{{ $info->ProductName }}</span>
                                        <a href="{{ URL::to('saveNewSlider/'.$info->ProductId) }}"><button type="text" class="btn btn-info">Them</button></a>
                                    </div> -->

                                    <tr>
                                        <td style="width: 100px">
                                            <img width="75px" height="75px" src="{{asset('public/Uploads/Products/'.$info->ProductImage)}}" alt="">
                                        </td>
                                        <td style="width: 200px;">
                                            {{ $info->ProductName }}
                                        </td>
                                        <td style="text-align: right; padding: 15px;">
                                            <a href="{{ URL::to('saveNewSlider/'.$info->ProductId) }}">
                                                <button class="btn btn-info">Thêm</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                
                                    <div style="align: center;">
                                        <?php
                                            $message = Session::get('message');
                                            if($message){
                                                echo $message;
                                                Session::put('message', null);
                                            };
                                        ?>
                                    </div>
                                </div>
                                
                            <!-- </form> -->
                            </div>
                            <div style="text-align: center;">
                                <a href="{{ url()->previous() }}">
                                    <span text="text" class="btn btn-info" style="background:whitesmoke; color:black;">Quay lại</span>
                                </a>
                            </div>
                        </div>
                    </section>

            </div>

@endsection
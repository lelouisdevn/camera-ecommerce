<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Atlanteans | Trang chủ</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/hover.css')}}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


</head><!--/head-->

<!-- //style css-->
<style>

    .container1{
        border-top: black solid 2px;
    }
    .container1 .left {
        float:  left;
        width:  18%;
        margin: 10px 0;
        border-right: black solid 2px;
        height: auto;
        border-bottom: black solid 2px;
        margin-left: -15px;
    }

    .container1 .right {
        float: right;
        width: 82%;
    }

    .center1{
        padding-left: 20px;
    }
    .center1 ul {
        border-bottom: black solid 2px;
        margin-right: 5px;
        padding-top: 5px;
        padding-left: 0;
        padding-bottom: 5px;
    }

    .center1 ul:last-child {
        border-bottom: none;
    }

    .center1 ul li {
        padding: 7px;
        font-size: 17px;
        border-radius: 5px;
        font-weight: 400;
        font-family: sans-serif;
        margin-right: 5px;
        margin-bottom: 10px;
    }
    .center1 ul li:hover {
        background-color: black;
        color:  white;
        padding-left: 15px;
        transition: 500ms;
    }
    .center1 {
        margin-left: 0;
    }
    .center1 a{
        color: black;
        font-size: 17px;
    }
    .center1 a:hover{
        color: white;
    }
    .center1 h4{
        font-size: 20px;
        font-family: sans-serif;
        font-weight: bold;
    }

    .left .title{
        background-color: black;
        margin-left: -15px;
        padding: 10px;
        color:  white;
    }


    .right .product {
        margin-left: 10px;
        margin-top: 15px;
    }
    .right .title {
        background-color: black;
        color: white;
        padding: 10px;
        margin: 10px 0 0 10px;
        }

    .col1{
        float: left;
        width: 30%;
        border: whitesmoke solid 1px;
        margin-right: 20px;
        margin-left: 25px;
        padding: 10px 10px 20px 10px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .cart1 a{
        color: white;
        font-size: 16px;
        font-family: sans-serif;
    }

    .product .col1 .cart1 {
        background-color: cornflowerblue;
        margin: 20px 0 0 0;
        padding: 10px;
        text-align: center;
        font-size: 16px;
        border-radius: 5px;
    }

    .product .col1 .cart1:hover{
        background-color: black;
        color: white;
        transition: 500ms;
    }


    /*.product .col1 .cart1 a {
        color: black;
    }
    .product .col1 .cart1 a:hover{
        color: white;
    }*/
    .product .col1 img {
        margin: 0 90px;
        width: 250px;
        height: 250px;
    }
    .product .col1 img:hover {
        border-image: black solid 1px;
        transition: 400ms;
    }
    .container2{
        overflow: auto;
        width: 100%;
        margin-top: 10px;
    }

    .left1 {
        float: left;
        width: 40%;
        color: black;
        font-size: 16px;
    }

    .right1 {
        float: right;
        width: 60%;
        text-align: right;
        font-size: 20px;
        color: black;
    }

    .centt img {
        margin: 0 auto;
        width: 100%;
    }

    .button1a {
        padding: 7px 14px;
        background-color: #5361b5;
        color: white;
        border-radius: 5px;
        border: 0px;

    }
    .col-sm-6 button:hover {
        background-color: #303d87;
        color: white;
        border-radius: 5px;
        transition: 400ms;
    }
    .pyssurt {
      font-size: 40px;
      text-align: center;
      font-family: freemono;
      font-weight: 700;
      color: #0165b9;
      background: white;
    }
    .pyssurt1 {
        font-size: 20px;
        padding-top: -10px;
        padding-bottom: 10px;
    }
</style>
 <body>

        <div style="position: sticky; top: 0; z-index: 100; background: whitesmoke;">
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row" style="padding-top: 0; padding-bottom: 0;">
                    <div class="col-sm-4">
                        <div class="logo pull-left" style="margin-left:10px;">
                            <!-- <a href="index.html"><img src="{{('frontend/images/logo.png')}}" alt="" /></a> -->
                            <h3><a style="font-family: freemono; font-weight: bold; font-size: 27px;" href="{{URL::to('Homepage')}}">Atlanteans</a></h3>
                        </div>

                    </div>
                    <div class="col-sm-1" style="float: left; width: 33.3333%; text-align: center; margin-top: 10px;">
                        <form action="{{URL::to('/search')}}" method="GET">
                            {{ csrf_field() }}
                            <div class="search_box pull-right" style="width: 100%;">
                                <input style="width: 100%;" name="keyword" type="text" placeholder="Tìm kiếm..."/>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-8" style="float: right;">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">

                                <li><a href="{{URL::to('displayWishlist')}}"><i class="fa fa-heart"></i> SP yêu thích</a></li>
                                <?php



                                    $UserId = Session::get('UserId');
                                    $info = DB::table('tbl_cart')->where('UserId', $UserId)->get();

                                    $soluong = 0;
                                    foreach($info as $key => $in){
                                        $soluong += 1;
                                    }



                                    if($soluong > 0){
                                ?>
                                <li><a href="{{URL::to('showCarts')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng <span style="width: 20px; background: red; border-radius: 50%; display: inline-block; text-align:center; color: white; font-weight: bold;"><?php echo "$soluong";?></span></a></li>
                                <?php
                                    }else{
                                ?>
                                <li><a href="{{URL::to('showCarts')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <?php
                                    }
                                ?>
                                <?php
                                    $UserId = Session::get('UserId');
                                    if($UserId != NULL) {


                                ?>
                                <li><a href="{{URL::to('/signOut')}}"><i class="fa fa-user"></i> Đăng xuất</a></li>
                                <?php
                                }else{
                                    ?>
                                        <li><a href="{{URL::to('/UserLogin')}}"><i class="fa fa-user"></i> Đăng nhập</a></li>
                                    <?php
                                }
                                ?>
                                <?php
                                    $UserId = Session::get('UserId');
                                    if($UserId){
                                ?>
                                        <li><a href="{{URL::to('displayProfile/'.$UserId)}}"><i class="fa fa-cog"></i> Tài khoản</a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <style>
            .sub-menu ul li:hover {
                background: white;
            }
        </style>
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row" style="border-bottom:  #cccccc solid 2px;">
                    <div class="col-sm-9" style="width: 100%;">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/Homepage')}}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="{{URL::to('/showProduct')}}">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                         @foreach ( $Category as $key => $ct)
                                        <li><a style="font-size: 15px;" href="{{URL::to('Category/'.$ct->CategoryId)}}">{{ $ct->CategoryName }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                 <li class="dropdown"><a href="#">Thương hiệu<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                         @foreach ( $Trademark as $key => $tr)
                                        <li><a style="font-size: 15px;" href="{{URL::to('Brand/'.$tr->TrademarkId)}}">{{ $tr->TrademarkName }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <!-- <li class="dropdown"><a href="#">Liên hệ<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="https://www.instagram.com/atlanteansvietnam/"> Instagram</a></li>
                                        <li><a href="https://twitter.com/atlanteansvietnam"> Twitter</a></li>
                                        <li><a href="https://www.youtube.com/channel/UCQs7OUSa3dl4FmBhWlysVBA"> YouTube</a></li>
                                        <li><a href="{{URL::to('hotnews/1')}}"> Tin tức</a></li>

                                    </ul>
                                </li> -->
                                <li><a href="{{URL::to('hotnews/1')}}">Tin tức</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
</div>
<style>
    #slider {
        position: sticky;
        top: 120px;
        z-index: 0;
        background: white;
    }
    #blabla {
        position: relative;
        z-index; 1;
    }
    .foot {
        background: black;
        position: relative;
        z-index: 1;
    }
</style>
    <section id="slider"><!--slider-->
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                            <li data-target="#slider-carousel" data-slide-to="3"></li>

                        </ol>

                        <div class="carousel-inner">
                        @php
                            $i=0;
                        @endphp
                        @foreach($Slider as $key => $sl)
                            @php
                                $i++;
                            @endphp
                            <div class="item {{$i==1 ? 'active' : '' }}">
                                <div class="col-sm-6">
                                    <h1>{{ $sl->ProductName }}</h1>
                                    <!-- <h2>Cyber-shot Digital Still Camera</h2> -->
                                    <p>{{ $sl->ProductDescription }}</p>
                                    <a href="{{URL::to('/ProductDetail/'.$sl->ProductId)}}">
                                        <button type="button" class="button1a">Xem sản phẩm</button>
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <img style="margin:0 auto;" width="550px" height="550px;"
                                     src="{{asset('Uploads/Products/'.$sl->ProductImage)}}"
                                      class="girl img-responsive" alt="" />
                                    <!-- <img src="{{'frontend/images/pricing.png'}}"  class="pricing" alt="" /> -->
                                </div>
                            </div>
                            <!-- <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-NIKON COOLPIX D900</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <a href="{{URL::to('/ProductDetail/21')}}"><button type="button" class="button1a">Xem sản phẩm</button></a>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('frontend/images/canon2.jpeg')}}" class="girl img-responsive" alt="" />
                                </div>
                            </div> -->

                            <!-- <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="button1a">Xem sản phẩm</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('frontend/images/canon3.jpeg')}}" class="girl img-responsive" alt="" />
                                </div>
                            </div> -->
                            <!-- <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="button1a">Xem sản phẩm</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="height: 750px; width: 850px;" src="{{asset('frontend/images/fujifilm.jpeg')}}" class="girl img-responsive" alt="" />
                                </div>
                            </div> -->
                        @endforeach
                        </div>


                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->


    <section id="blabla">

    <style type="text/css">
        .khung {
            background-color: white;
        }
        .khung div {
            padding-bottom: 10px;
        }
        .khung div span {
            padding: 10px;
        }
        .khung div span {
            border: whitesmoke solid 1px;
            display: inline-block;
            width: 300px;
            height: 250px;
            margin: 10px;
            border-radius: 7px;
        }
        .khung span:hover {
            filter: drop-shadow(0 0 0.75rem whitesmoke);
            background: whitesmoke;
        }
        .browse{
            text-align: center;
            padding: 10px;
            border-radius: 15px;
            background: #ff7168;
            width: 13%;
            margin: 0 auto;
            font-size: 20px;
            color: white;
            font-weight: bold;
        }
        .browse:hover {
            background: #02afae;
            transition: 400ms;
        }

    </style>
        <div style="background: white; padding: 10px 0;" class="khung" >
                <div style="text-align: center; font-size: 30px; color: black; padding-top: 15px; padding-bottom: 15px;">Danh mục sản phẩm</div>
                <div style="text-align: center; ">
                    <span style="padding: 20px 10px 0 10px;">
                        <a href="{{URL::to('Category/25')}}"><img width="180px" height="180px;" src="{{asset('Atlanteans/Sony-Cybershot-DSC-HX350.png')}}"></a>
                    </span>
                    <span>
                        <a href="{{URL::to('Category/21')}}"><img width="200px" height="200px" src="{{asset('Atlanteans/Vario-Tessar-T-E-16-70mm-F4-ZA-OSS.png')}}"></a>
                    </span>
                    <span>
                        <a href="{{URL::to('Category/24')}}"><img width="200px" height="200px" src="{{asset('Atlanteans/Canon-EOS-3000D.png')}}"></a>
                    </span>
                </div>
                <div style="text-align: center; margin: 50px;">
                    <span>
                        <a href="{{URL::to('Category/23')}}"><img width="200px" height="200px" src="{{asset('Atlanteans/Tripod-Benro-T880EX.png')}}"></a>
                    </span>
                    <span>
                        <a href="{{URL::to('Category/22')}}"><img width="200px" height="200px" src="{{asset('Atlanteans/SDHC-SanDisk-16GB-Class4.png')}}"></a>
                    </span>

                    <span>
                        <a href="{{URL::to('Category/26')}}"><img width="200px" height="200px" src="{{asset('Atlanteans/sonyDSC-WX800.png')}}"></a>
                    </span>
                </div>
                <a href="{{URL::to('/showProduct')}}">
                <div class="browse" >
                    Xem sản phẩm
                </div>
                </a>
        </div>


        <div>
            <div class="centt">
                <img height="" src="{{asset('frontend/images/pyssurt10.png')}}">
            </div>
            <!-- <div>
                <img style="width: 100%;" src="{{asset('frontend/images/pyssurt2.png')}}">
            </div> -->
            <div class="pyssurt">
                Atlanteans
                <div class="pyssurt1">
                    atlanteansvietnam@outlook.com
                </div>
                <div style="padding-bottom: 5px;">
                    <a href="https://www.youtube.com/channel/UCQs7OUSa3dl4FmBhWlysVBA">
                        <img height="60px" width="60px" src="https://img.icons8.com/ios/100/000000/youtube-play--v1.png"/>
                    </a>
                    <a href="https://twitter.com/pyssurt">
                        <img src="https://img.icons8.com/ios/50/000000/twitter--v1.png"/>
                    </a>
                    <a href="https://www.instagram.com/atlanteansvietnam">
                        <img height="50px" width="50px" src="https://img.icons8.com/ios/50/000000/instagram-new.png"/>
                    </a>
                    <a href="mailto:atlanteansvietnam@outlook.com">
                        <img width="50px" height="50px" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-email-interface-kiranshastry-lineal-kiranshastry.png"/>
                    </a>
                    <a href="https://t.me/atlanteansvietnam">
                        <img src="https://img.icons8.com/ios/50/000000/telegram-app.png"/>
                    </a>
                </div>
                <!-- <div style="margin: 0 32; background: white;">
                    <div class="brandnew" style="padding-bottom: 5px;">
                        <a href="https://electronics.sony.com/imaging/c/compact-cameras" target="_blank"><span style="background: #1f203f; color: white;">Sony</span></a>
                        <a href="https://www.nikon.com/" target="_blank"><span style="background: #bf5973; color: white;">Nikon</span></a>
                        <a href="https://www.usa.canon.com/internet/portal/us/home" target="_blank"><span style="background: #993dc2; color: white;">Canon</span></a>
                        <a href="https://us.leica-camera.com/" target="_blank"><span style="background: #f23b0d; color: white;">Leica</span></a>
                        <a href="https://olympusamerica.com/" target="_black;"><span style="background: #ff1a80; color: white;">Olympus</span></a>
                        <a href="https://www.fujifilm.com/" target="_blank"><span style="background: #80bf59; color: white;">Fujifilm</span></a>
                    </div>
                </div> -->
            </div>

<style>
    .brandnew span {
        padding: 10px 25px;
        border-radius: 22px;
        background: grey;
        font-size: 16px;
    }
</style>

        </div>

    </section>









    <div class="foot">
    <footer id="footer" style="margin: auto 15%;"><!--Footer-->




        <div >
        <div class="footer-widget">
            <div class="container">
                <div class="row" style="border-bottom: white solid 2px; padding-bottom: 20px;">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Trợ giúp</a></li>
                                <li><a href="#">Liên lạc</a></li>
                                <li><a href="#">Đơn hàng</a></li>
                                <!-- <li><a href="#"></a></li> -->
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>CHÍNH SÁCH</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách riêng tư</a></li>
                                <li><a href="#">Chính sách đổi - trả</a></li>
                                <li><a href="#">Chính sách giao hàng</a></li>
                                <li><a href="#">Sử dụng Cookies</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2" style="width:20%">
                        <div class="single-widget">
                            <h2>THÔNG TIN CỬA HÀNG</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <!-- <li><a href="#">Our Information</a></li> -->
                                <li><a href="#">Chuỗi cửa hàng</a></li>
                                <li><a href="#">Đánh giá</a></li>
                                <li><a href="#">Cách thức hoạt động</a></li>
                                <li><a href="#">Bản quyền nội dung</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="padding-top: 20px;">
                    <span style="padding-right: 10px;">
                        <a href="https://us.leica-camera.com/" target="_blank"><img src="{{asset('frontend/images/logoLeica.svg')}}"></a>
                    </span>
                    <span style="padding-right: 10px;">
                        <a href="https://www.usa.canon.com/internet/portal/us/home" target="_blank"><img style="height: 50px; width: 50px; border-radius: 50px;" src="{{asset('frontend/images/logoCanon.jpeg')}}"></a>
                    </span>
                    <span style="padding-right: 10px;">
                        <a href="https://www.nikon.com/" target="_blank"><img style="height: 50px; width: 50px; border-radius: 50px;" src="{{asset('frontend/images/NikonLogo.png')}}"></a>
                    </span>
                   <span style="padding-right: 10px;">
                        <a href="https://electronics.sony.com/imaging/c/compact-cameras" target="_blank"><img style="height: 50px; width: 50px; border-radius: 50px;" src="{{asset('frontend/images/logoSony.jpeg')}}"></a>
                    </span>
                    <span style="padding-right: 10px;">
                        <a href="https://www.fujifilm.com/" target="_blank"><img style="height: 50px; width: 50px; border-radius: 50px;" src="{{asset('frontend/images/logoFujifilm.png')}}"></a>
                    </span>
                <div>
                <div style="font-size: 17px; color: white; padding-top: 30px; font-family: sans-serif;">
                    &copy; 2021 - Copyright by Ngo Tran Vinh Thai.
                </div>
            </div>
        </div>
        <div>

    </footer><!--/Footer-->
</div>





    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chi tiết sản phẩm</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/hover.css')}}">
    <script src="{{asset('frontend/js/ratingstar.js')}}"></script>
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
     .left {
        float:  left;
        width:  18%;
        height: auto;
        margin-left: -15px;
        position: sticky;
        top: 100px;
        margin-top: -20px;
    }



     .right {
        float: right;
        width: 82%;
    }

    .right11 {
        float: right;
        width: 80%;
        margin-top: -20px;
    }
    .center1{
        padding-left: 20px;
    }

    .center1 ul li {
        display: inline-block;
        padding: 7px;
        font-size: 15px;
        border-radius: 5px;
        width: 43%;
        font-weight: 400;
        font-family: sans-serif;
        margin-right: 5px;

    }
    .center1 ul li:hover {
        background-color: #252525;
        color:  white;
        padding-left: 15px;
        transition: 500ms;
    }
    .center1 {
        margin-left: 0;
    }
    .center1 a{
        color: black;
        font-size: 15px;
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
        background-color: #252525;
        margin-left: -15px;
        padding: 3px;
        color:  white;
    }

    .right .product {
        margin-left: 10px;
        margin-top: 15px;
    }
    .right .title {
        background-color: #252525;
        color: white;
        padding: 2px;
        margin: 10px 0 0 10px;
        }

    .col1{
        float: left;
        width: 30%;
        border: whitesmoke solid 1px;
        margin-right: 20px;
        margin-left: 31px;
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
        background-color: #5361b5;
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
    .right111 {
		margin-left: 100px;
	}
	.view-product img {
		width: 500px;
		height: 500px;
	}
	.tbl {
		border: 1px solid black;
		font-size: 17px;
		width: 50%;
	}
	.tbl tr{
		border: 1px solid black;
	}
	.tbl tr td {
		border:  1px solid black;
		padding: 10px;
	}
	.tbl tr td:last-child {
		width: 70%;
	}


    .container1{
        border-top: black solid 2px;
    }
    .container1 .left {
        float:  left;
        width:  18%;
        margin: 10px 0;
        height: auto;
        margin-left: -15px;
    }

    .container1 .right {
        float: right;
        width: 82%;
    }

    .right11 {
        float: right;
        width: 82%;
        border-left: grey solid 1px;
    }
    .center1{
        padding-left: 20px;
    }
    .center1 ul {
        border-bottom: grey solid 1px;
        margin-right: 5px;
        padding-top: 5px;
        padding-left: 0;
        padding-bottom: 5px;
    }

    .center1 ul:last-child {
        border-bottom: none;
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

    .right .product {
        margin-left: 10px;
        margin-top: 15px;
    }

    /*.col1{
        float: left;
        width: 30%;
        border: whitesmoke solid 1px;
        margin-right: 20px;
        margin-left: 25px;
        padding: 10px 10px 20px 10px;
        margin-top: 20px;
        margin-bottom: 20px;
    }*/

    .cart1 a{
        color: white;
        font-size: 16px;
        font-family: sans-serif;
    }

    .product .col1 .cart1 {
        background-color: #5361b5;
        margin: 20px 0 0 0;
        padding: 10px;
        text-align: center;
        font-size: 16px;
        border-radius: 5px;
    }

    .product .col1 .cart1:hover{
        background-color: #303d87;
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
    .product-information p{
    	font-size: 16px;
    }
    .bang {
    	width: 50%;
    	border: #ff7168 solid 1px;
    	margin-top: 20px;
    	font-size: 14px;
    }
    .bang .hang {
    	background-color: #ff7168;
    	border: #ff7168 solid 1px;
    	text-align: center;
    	color: white;
    }
    .bang td {
    	padding: 10px;
    	border: #ff7168 solid 1px;
    }

    .nut {
    	padding: 10px 20px;
    	background-color: #5361b5;
    	border-radius: 5px;
    	border: 0;
    	color: white;
    	font-size:16px;
    	margin-top: 10px;
    }
    .nut:hover {
    	background-color: black;
    	color: whitesmoke;
    	transition: 400ms;
    }
</style>
 <body>

        <div style="position: sticky; top: 0; z-index: 100; background: whitesmoke;">
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row" style="padding-top: 0; padding-bottom: 0;">
                    <div class="col-sm-4">
                        <div class="logo pull-left" style="margin-left: 10px;">
                            <!-- <a href="index.html"><img src="{{('frontend/images/logo.png')}}" alt="" /></a> -->
                            <h3><a style="font-family: freemono; font-weight: bold; font-size:27px" href="{{URL::to('Homepage')}}">Atlanteans</a></h3>
                        </div>

                    </div>
                    <div class="col-sm-1" style="float: left; width: 33.3333%; text-align: center; margin-top: 10px;">
                    <form action="{{URL::to('/search')}}" method="GET">
                            {{ csrf_field() }}
                            <div class="search_box pull-right" style="width: 100%;">
                                <input name="keyword" type="text" placeholder="Tìm kiếm..."/>
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
                                if($UserId != NULL){
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
                                <li class="dropdown"><a href="{{URL::to('showProduct')}}">Sản phẩm<i class="fa fa-angle-down"></i></a>
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
                                <!-- <li class="dropdown"><a href="#">Liên lạc<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="https://www.instagram.com/pyssurtvietnamvn/"> Instagram</a></li>
                                        <li><a href="https://twitter.com/pyssurt"> Twitter</a></li>
                                        <li><a href="https://www.youtube.com/channel/UCQs7OUSa3dl4FmBhWlysVBA"> YouTube</a></li>
                                    </ul>
                                </li>  -->
                                <li><a href="{{URL::to('hotnews/1')}}">Tin tức</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
</div>
    <section>
        <div class="container">
            <div class="row">

    <div class="left">
        <div>
        <div class="title" style="border-radius: 5px; width: 97%; margin: 0 20px; padding:3px;">
            <center><h4 style="font-size: 17px;">DANH MỤC SẢN PHẨM</h4></center>
        </div>
        <div class="center1">
            <h4 style="font-size:16px;">THƯƠNG HIỆU</h4>
            <ul>
            @foreach ( $Trademark as $key => $tr )
                <a href="{{URL::to('Brand/'.$tr->TrademarkId)}}"><li>{{ $tr->TrademarkName }}</li></a>
            @endforeach
            </ul>
            <ul>
            @foreach ( $Category as $key => $ct)
                <a href="{{URL::to('Category/'.$ct->CategoryId)}}"><li>{{ $ct->CategoryName }}</li></a>
            @endforeach
            </ul>
        </div>
        </div>
    </div>


    <div class="right11">

        @yield('content')

    </div>



            </div>
        </div>
    </section>
<style type="text/css">
    .foot {
        background-color: black;
    }
</style>
<div class="foot">
    <footer id="footer" style="margin: auto 15%;"><!--Footer-->




        <div>
        <div class="footer-widget">
            <div class="container">
                <div class="row" style="border-bottom: white solid 2px; padding-bottom:20px;">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Trợ giúp</a></li>
                                <li><a href="#">Liên lạc</a></li>
                                <li><a href="#">Tình trạng đơn hàng</a></li>
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
                    <div class="col-sm-2" style="width:20%;">
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
    <script src="{{asset('frontend/js/ratingstar.js')}}"></script>
</body>
</html>

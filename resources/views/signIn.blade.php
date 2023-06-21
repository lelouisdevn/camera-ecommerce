<!DOCTYPE html>
<head>
<title>Đăng nhập</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->

<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/myform.css')}}">
<script type="text/javascript" src="{{asset('frontend/js/myform.js')}}"></script>
</head>
<style>

</style>
<body style="background: cornflowerblue;">




<form name="form1" method="POST" action="{{URL::to('/authenticate')}}">
	{{ csrf_field() }}

	<div class="container">
		<div class="header">
			<div class="logo-left"><a style="color: cornflowerblue; font-family: Freemono;" href="{{URL::to('/Homepage')}}">Atlanteans</a></div>
			<!-- <div class="logo"><a href="{{URL::to('/Homepage')}}"><img style="height: 50px; width:50px; padding-top: 30px;" src="{{asset('frontend/images/pyssurt.png')}}" ></a></div> -->
		</div>
		<div style="font-weight: bold; text-align: center;"><h2>Đăng nhập</h2></div>
		<div>
	<?php
		$message = Session::get('message');
		if($message){
			echo $message;
			Session::put('message', null);
		};
	?>
		</div>
		<div>
			<input id="id1" type="text" name="UserEmail" placeholder="Nhập địa chỉ Email:" required="" onblur="checkEmail()">
		</div>
		<div>
			<input id="id2" type="password" name="UserPassword" placeholder="Nhập mật khẩu tài khoản:" required="">
		</div>
		<div style="width: 100%; overflow: auto;">
			<div style="float: left; width: 70%;">
				Chưa có tài khoản? <a href="{{URL::to('/registerAccount')}}">Tạo tài khoản!</a>
			</div>
			<div style="float: right; width:25%;">
				<a href="{{URL::to('forgotpassword')}}">Quên mật khẩu?</a>
			</div>
		</div>

		<div class="footer">
			<input type="submit" value="Đăng nhập" name="login">
		</div>
	</div>
	</form>


<script src="{{asset('/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('/backend/js/scripts.js')}}"></script>
<script src="{{asset('/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('/backend/js/jquery.scrollTo.js')}}"></script>
</body>
</html>

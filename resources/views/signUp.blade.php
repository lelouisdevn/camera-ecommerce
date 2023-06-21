<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng ký</title>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/myform.css')}}">
	<script src="./form.js"></script>
</head>
<body>
	<form name="form1" method="POST" action="{{URL::to('/UserRegister')}}" onsubmit="return validate()">
		{{ csrf_field() }}
	<div class="container">
		<div class="header">
			<div class="logo-left"><a style="color: cornflowerblue; font-family: Freemono;" href="{{URL::to('/Homepage')}}">Atlanteans</a></div>
			<!-- <div class="logo">
				<a href="{{URL::to('/Homepage')}}"><img  style="height: 50px; width:50px; padding-top: 30px;" src="{{asset('/frontend/images/pyssurt.png')}}" /></a>
			</div> -->
		</div>
		<div style="font-weight: bold; text-align: center;"><h2>Đăng ký</h2></div>
		<div>
			<input id="id2" type="text" name="Name" placeholder="Nhập vào tên của bạn:" onfocus="secureInput('id2')" onblur="checkName()">
		</div>
		<div>
			<input id="id1" type="text" name="Email" placeholder="Nhập vào địa chỉ Email:" onfocus="secureInput('id1')" onblur="checkEmail()">
		</div>
		<div>
			<input id="id3" type="text" name="Phone" placeholder="Nhập số điện thoại:" onfocus="secureInput('id1')">
		</div>
		<div>
			<input id="id4" type="password" name="Password" placeholder="Tạo mật khẩu cho tài khoản:" onfocus="secureInput('id1')">
		</div>
		<div class="inp" style="width: 100%; overflow: auto;">
			<div style="width: 15%; float: left;">

				<span style="display: inline-block; padding-top: 3px;">Nam:</span>
				<span><input style="padding: 5px; width: 15px;" value="1" type="radio" name="Gender"></span>
			</div>
			<div style="width: 18%; float: left; margin-left: 20px;">
				<span style="display: inline-block; padding-top: 3px;">Nữ:</span>
				<span><input style="padding: 7px; width: 15px;" value="0" type="radio" name="Gender"></span>
			</div>
		</div>
		<div class="row">
			<div>
				<h3>Ngày sinh</h3>
			</div>

			<div class="left">
				<select name="day" required>
					<script language="javascript" type="text/javascript">
						for(var d=1;d<=31;d++) {
    						document.write("<option>"+d+"</option>");
						}
					</script>
				</select>
			</div>
			<div class="left">
				<select class="light" name="month" required>
					<option value="1">Tháng 1</option>
					<option value="2">Tháng 2</option>
					<option value="3">Tháng 3</option>
					<option value="4">Tháng 4</option>
					<option value="5">Tháng 5</option>
					<option value="6">Tháng 6</option>
					<option value="7">Tháng 7</option>
					<option value="8">Tháng 8</option>
					<option value="9">Tháng 9</option>
					<option value="10">Tháng 10</option>
					<option value="11">Tháng 11</option>
					<option value="12">Tháng 12</option>
				</select>
			</div>
			<div class="left">
				<select name="year" required>
					<script>
						for(var d = 2021; d>=1950; d--) {
							document.write("<option>"+d+"</option>");
						}
					</script>
				</select>
			</div>
			<!-- <div>
				<p>
					<input type="radio" value="1" name="Gender">
				</p>
				<p>
					<input type="radio" value="0" name="Gender">
				</p>
			</div> -->
		</div>
		<div class="footer">
			<input onclick="readForm();" onsubmit="reset(form1)" name="submit" type="submit" value="Đăng ký">
		</div>
	</div>
	</form>
</body>
</html>

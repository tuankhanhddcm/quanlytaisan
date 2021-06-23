<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Quản Lý Tài Sản Công</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="keywords" content="Online Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="{{URL::asset('css/login.css')}}" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="{{URL::asset('css/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body style="background: url({{URL::asset('img/1.jpg')}}) no-repeat center top;background-size: cover;">
<!-- main -->
<div class="center-container">
	<!--header-->
	<div class="header-w3l">
		<h1>Quản Lý Tài Sản Công</h1>
	</div>
	<!--//header-->
	<div class="main-content-agile">
		<div class="sub-main-w3">	
			<div class="wthree-pro">
				<h2>Đăng nhập vào tài khoản</h2>
			</div>
			<form action="/login" method="post" onsubmit="return checklogin();">
				@csrf
				<div class="pom-agile">
					<input placeholder="Tên đăng nhập" name="name" id="name" class="user" onkeyup="check('#name')" type="text" >
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
				</div>
				<div style="display: flex;">
					<i class='bx bxs-error-circle name_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.2rem;padding-right: 5px;"></i>
					<span class="error_name error" ></span>
				</div>
				<div class="pom-agile">
					<input  placeholder="Nhập mật khẩu" name="pass" class="pass" onkeyup="check('.pass')" type="password" >
					<span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
				</div>
				<div style="display: flex;">
					<i class='bx bxs-error-circle pass_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.2rem;padding-right: 5px;"></i>
					<span class="error_pass error" ></span>
				</div>
				<div class="sub-w3l">
					<h6><a href="#">Quên mật khẩu?</a></h6>
					<div class="right-w3l">
						<input type="submit" onclick="checklogin()" value="Đăng nhập">
						<input type="button"  value="Đăng ký">
					</div>
				</div>
			</form>
		</div>
	</div>
	<!--//main-->
	<!--footer-->
	<div class="footer">
		<p> Public asset management - Can Tho University</p>
		<p> Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ</p>
	</div>
	<!--//footer-->
</div>
<script src="{{ URL::asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('js/moment.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL::asset('js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('js/adminlte.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="{{ URL::asset('js/main.js')}}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./../mvc/assets/css/login.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style>
		.form-error{
			padding: 5px 15px;
			width: fit-content;
			margin: 20px auto;
			border-radius: 20px;
			background-color: orangered;
			text-align: center;
			display: none;
			cursor: pointer;
		}

		.form-error span, i{
			font-size: 12px;
			text-align: center;
			color: white;
			font-weight: 500;
		}
	</style>
	<title>Đăng nhập BookingHotel</title>
</head>
<body>
	<div class="container">
		<form action="./../cHome/home" method="POST" class="login-username" id="form-login">
			<p class="login-text" style="font-size: 2rem; font-weight: bold;">Đăng nhập</p>
			<div class="form-error" id="form-error">
				<i class="fas fa-exclamation-circle"></i>
				<span id="message-error"></span>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Tài Khoản" name="username" id="username">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Mật Khẩu" name="password" id="password">
			</div>
			<div class="input-group">
				<button type="button" onclick="login()" class="btn" style="margin-top: 30px;">Đăng Nhập</button>
			</div>
			<p class="login-register-text">Bạn chưa có tài khoản? <a href="./../cAuth/signup">Đăng ký ngay</a></p>
			<p class="login-forgetpassword-text"><a href="register.php">Quên Mật Khẩu?</a></p>
		</form>
	</div>
</body>
</html>

<script type="text/javascript">
	function login(){
		let username = $('#username').val();
		let password = $('#password').val();
		$.ajax({
				type: "POST",
				data:{
					'username': username,
					'password': password,
				},
				dataType: 'text',
				url: './../cAuth/login' ,
				success: function(json){
					let result = JSON.parse(json);
					if(result === 'username'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Tài khoản không tồn tại !");
					}else if(result === 'password'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Mật khẩu không chính xác !");
					}else if(result === 'fail'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Xảy ra lỗi, vui lòng thử lại !");
					}else if(result === 'null'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Vui lòng kiểm tra lại tài khoản và mật khẩu !");
					}else{
						document.getElementById('form-error').style.display = 'none';
						$('#form-login').submit();
					}
				},
				error: function(error) {
					console.log(error);
				}
		});
	}
</script>
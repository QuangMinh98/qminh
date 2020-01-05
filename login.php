<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Thế giới phim truyện</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
	<script src="jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
				$.ajax({
					url: 'xuly.php',
					type: 'POST',
					cache: false,
					success:function(d){
							alert(d);
					},
					error:function(){
						alert("Bị lỗi");
					}
				})
			})
	</script>
	<style type="text/css">
		.login{
			-webkit-tap-highlight-color: transparent;
			font-size: 1rem;
			font-weight: 400;
			line-height: 1.5;
			color: #212529;
			font-family: Poppins-Regular, sans-serif;
			margin: 0px;
			box-sizing: border-box;
			width: 100%;
			min-height: 100vh;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			padding: 15px;
			background: linear-gradient(-135deg, #c850c0, #4158d0);
		}

		.login .wrap{
			width: 960px;
			background: #fff;
			border-radius: 10px;
			overflow: hidden;
			justify-content: space-between;
			padding: 177px 90px 33px 85px;
		}
		h3{
			text-align: center;
			font-weight: bold;
			padding: 0px 0px 54px;
		}

		.inputid{
			-webkit-tap-highlight-color: transparent;
			box-sizing: border-box;
			touch-action: manipulation;
			margin: 0;
			overflow: visible;
			outline: none;
			border: none;
			font-family: Poppins-Medium;
			font-size: 15px;
			line-height: 1.5;
			color: #666666;
			display: block;
			width: 100%;
			background: #e6e6e6;
			height: 50px;
			border-radius: 25px;
			padding: 0 30px 0 68px;
			margin: 10px 0px;
		}

		.login-form{
			width: 50%;
		}

		form{
			display: block;
			margin: 0 auto;
		}

		.login-btn{
			width: 100%;
			padding-top: 20px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.btn{
			font-size: 15px;
			width: 100%;
			height: 50px;
			color: #fff;
			text-transform: uppercase;
			line-height: 1.5;
			border-radius: 25px;
    		background: #57b846;
		}

		.btn:hover{
			background: #333333;
		}

		.create{
			padding-top: 148px;
			text-align: center;
		}

		.txt{
			font-family: 'Roboto Slab', serif;
			font-size: 15px;
    		line-height: 1.5;
    		color: #666666;
		}

		a:hover{
			text-decoration: none;
    		color: #57b846;
		}
	</style>
</head>
<body>
	<div class="login">
		<div class="wrap">
			<form class="login-form" action="xuly.php" method="POST">
				<h3>Đăng Nhập</h3>
				<input class="inputid" type="text" name="id" placeholder="Tên Đăng Nhập">
				<input class="inputid" type="password" name="pass" placeholder="Mật Khẩu">
				<div class="login-btn">
					<input class="btn" type="submit" name="btn" value="Đăng Nhập">
				</div>
				<div class="create">
					<a class="txt" href="">Tạo tài khoản</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
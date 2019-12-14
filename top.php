<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Thế giới phim truyện</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<script>
	  function resizeIframe(obj) {
	    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
	  }
	</script>
</head>
<body>
	<div class="container">
		<div class="menu">
			<div class="row">
				<img style="margin-left: 50px;" src="Image/logo.png">
				<form action="#" method="GET" class="search">
					<input class="input" type="text" placeholder="Search Here">
					<button type="subbmit" class="btnsearch">Tìm kiếm</button>
				</form>
			</div>
			<ul style="margin-top: 30px;">
				<li><a href="index.php">Trang Chủ</a></li>
				<li><a href="#">Thể Loại</a>
					<ul>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-3">
								<li style="padding: 8px 15px">							
									<a href="#">Thể loại 1</a>
								</li>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3">
								<li style="padding: 8px 15px">							
									<a href="#">Thể loại 1</a>
								</li>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3">
								<li style="padding: 8px 15px">							
									<a href="#">Thể loại 1</a>
								</li>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3">
								<li style="padding: 8px 15px">							
									<a href="#">Thể loại 1</a>
								</li>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3">
								<li style="padding: 8px 15px">							
									<a href="#">Thể loại 1</a>
								</li>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3">
								<li style="padding: 8px 15px">							
									<a href="#">Thể loại 1</a>
								</li>
							</div>
						</div>
					</ul>
				</li>	
				<li><a href="#">Năm Phát Hành</a></li>
				<li><a href="#">Tình Trạng</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	<?php
	    $conn = new mysqli('localhost','root','','XemPhim');
	    mysqli_query($conn,'SET NAMES UTF8');
	    // Check connection
	    if(!$conn){
	        die("Kết nối thất bại". mysqli_connect_error($conn));
	    }
    ?>
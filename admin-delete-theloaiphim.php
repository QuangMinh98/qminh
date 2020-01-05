<?php
	session_start();
	$conn = new mysqli('localhost','root','','XemPhim');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "select * from phim,theloaiphim,theloai where phim.MaPhim=theloaiphim.MaPhim and theloaiphim.MaTL=theloai.MaTL and  theloaiphim.MaPhim = '".$_GET['id']."' and theloaiphim.MaTL='".$_GET['tl']."'";
    $result = $conn->query($sql);
    if($_SESSION['id'] != 'admin')
    {
    	header('Location: http://localhost:8888/qminh/login.php');
    }
?>
<head>
	<meta charset="utf-8">
	<title>Thế giới phim truyện</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<script src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				console.log("thành công");
				var MaPhim = $('#id').val();
				var MaTL = $('#tl').val();
				$.ajax({
					url: 'admin-delete.php',
					type: 'POST',
					data: {MaPhim:MaPhim,MaTL:MaTL},
					success:function(d){
						alert(d);
						window.location="admin-phim-theloai.php?id="+MaPhim;
					},
					error:function(){
						alert("Bị lỗi");
					}
				})
			})
		})
	</script>
	<style type="text/css">
		input[type=button]{
			background: #000033;
			color: #fff;
			width: 150px;
			height: 60px;
			margin-top: 30px;
			margin-left: 9.5%;
			border-radius: 15px 15px;
			-moz-border-radius: 15px 15px; /*Firefox*/
			-webkit-border-radius: 15px 15px;  /*Chrome và Safary*/
		}
		button:hover{
			background: #0033ff;
		}
	</style>
</head>
<body>
	<div class="vertical-menu">
		<h5>Menu</h5>
		<ul>
			<li style="background: #0033ff ;"><a style="color: #fff;" href="admin-top.php" class="active">Phim</a></li>
		    <li><a href="admin-theloai.php" class="active">Thể Loại</a></li>
		    <li><a href="admin-nam.php" class="active">Năm</a></li>
		    <li><a href="admin-taikhoan.php" class="active">Tài Khoản</a></li>
		    <li><a href="index.php" class="active">Trang Người Dùng</a></li>
		    <li><a href="logout.php">Đăng Xuất</a></li>
		</ul>
	</div>
	<div class="main">
		<h2 style="margin-bottom: 50px;"> Xóa Thể Loại Phim</h2>
		<div class="wrapper">
			<?php
				if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
			?>
			<div class="info">
				<h6 style="float: left; margin-right:10px;">Mã Phim:</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px;" type="text" value="<?php echo $row['MaPhim']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">Tên Phim:</h6>
				<input id="name" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row['TenPhim']; ?>" readonly>
			</div>
			<div class="img">
				<h6 style="float: left; margin-right:10px;">Mã Thể Loại:</h6>
				<input id="tl" style="float: left; margin-right:80px; width: 100px;" type="text" value="<?php echo $row['MaTL']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">Thể Loại:</h6>
				<input id="tentl" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row['TenTL']; ?>" readonly>
			</div> 
			<?php
				}
			}
			?>
			<input id="btn" type="button" name="" value="Xóa">
			<input id="btn" type="button" name="" value="Hủy">
		</div>
	</div>
</body>
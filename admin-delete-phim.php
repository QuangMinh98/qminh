<?php
	session_start();
	$conn = new mysqli('localhost','root','','XemPhim');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "select * from phim where MaPhim = '".$_GET['id']."'";
    $result = $conn->query($sql);
    $sql1 = "select * from namsx";
    $result1 = $conn->query($sql1);
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
				var id = $('#id').val();
				$.ajax({
					url: 'admin-delete.php',
					type: 'POST',
					data: {id:id},
					success:function(d){
						alert(d);
						window.location="admin-top.php";
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
		<h2 style="margin-bottom: 50px;"> Xóa Phim</h2>
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
				<h6 style="float:left ;margin-right: 10px;">Tên Hãng Sản Xuất:</h6>
				<input id="hang" style="float: left;" type="text" value="<?php echo $row['HangSX']; ?> " readonly>
			</div>
			<div class="img">
				<h6 style="float: left; margin-right: 10px;">Ảnh:</h6>
				<input id="image"  style="float: left; margin-right: 10px;" type="text" value="<?php echo $row['Image']; ?> " readonly>
				<img style="float: left; width: 60px; height: 80px;" src="" readonly>
				<h6 style="float: left; margin-left: 80px;">Ảnh Nền:</h6>
				<input id="back-img" style="float: left; margin-left: 10px;" type="text"value="<?php echo $row['back_image']; ?> " readonly>
				<img style="float: left; margin-left: 10px; width: 80px; height: 45px;" src="">
			</div>
			<div class="select">
				<h6 style="float: left; margin-right: 10px;">Năm SX:</h6>
				<select id="year" style="float: left; margin-right: 80px;" readonly>
					<?php
					if ($result1 && $result1->num_rows > 0){
	              		while($row1 = $result1->fetch_assoc()){
	              			if($row1['Nam'] == $row['Nam'])
	              				echo "<option value='".$row1['Nam']."' selected>".$row1['Nam']."</option>";
	              			else 
	              				echo "<option value='".$row1['Nam']."'>".$row1['Nam']."</option>";
	              		}
	              	}
					?>
				</select>
				<h6 style="float: left; margin-right: 10px;">Tình Trạng:</h6>
				<select id="tinhtrang" style="margin-right: 10px;" readonly>
					<?php
						if($row['TinhTrang'] == "Hoàn Thành")
	              				echo "<option value='Hoàn Thành' selected>Hoàn Thành</option>
	              						<option value='Đang Tiến Hành'>Đang Tiến Hành</option>";
	              			else 
	              				echo "<option value='Hoàn Thành'>Hoàn Thành</option>
	              					<option value='Đang Tiến Hành' selected>Đang Tiến Hành</option>";
					?>
				</select>
			</div> 
			<div>
				<h6 style="margin-left: 10%">Nội Dung: </h6>
				<textarea id="review" style="width: 50%; height: 30%; overflow: scroll; margin-left: 10%" readonly><?php echo $row['NoiDung'];  ?></textarea>
			</div>
			<?php
				}
			}
			?>
			<input id="btn" type="button" name="" value="Xóa">
			<a href="admin-top.php"><input style="background: red;" type="button" name="" value="Hủy"></a>
		</div>
		
		
	</div>
</body>

<?php
	$conn = new mysqli('localhost','root','','XemPhim');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "select * from tapphim where MaTapPhim = '".$_GET['id']."'";
    $result = $conn->query($sql);
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
				var MaTP = $('#MaTP').val();
				var ep = $('#ep').val();
				var link = $('#link').val();
				var query = "update tapphim set TenTapPhim='"+ep+"', link='"+link+"' where MaTapPhim='"+MaTP+"'";
				$.ajax({
					url: 'update.php',
					type: 'POST',
					data: {query:query},
					success:function(d){
						alert(d);
						window.location="admin-chitiet.php?id="+id;
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
		    <li><a href="#" class="active">Năm</a></li>
		    <li><a href="#" class="active">Tài Khoản</a></li>
		    <li><a href="#" class="active">Trang Người Dùng</a></li>
		</ul>
	</div>
	<div class="main">
		<h2 style="margin-bottom: 50px;"> Sửa Tập Phim</h2>
		<div class="wrapper">
			<?php
			if ($result && $result->num_rows > 0){
	             while($row = $result->fetch_assoc()){
	             	$sql1 = "select * from phim where MaPhim='".$row['MaPhim']."'";
	             	$result1 = $conn->query($sql1);
					if ($result1 && $result1->num_rows > 0){
		             	while($row1 = $result1->fetch_assoc()){
			?>
			<div class="info">
				<h6 style="float: left; margin-right:10px;">Mã Tập Phim:</h6>
				<input id="MaTP" style="float: left; margin-right:80px; width: 100px;" type="text" value="<?php echo $row['MaTapPhim']; ?> " readonly>
				<h6 style="float: left; margin-right:10px;">Mã Phim:</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px;" type="text" value="<?php echo $row1['MaPhim']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">Tên Phim:</h6>
				<input id="name" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row1['TenPhim']; ?>" readonly>
			</div>
			<?php
				}
			}
			?>
			<div class="img">
				<h6 style="float: left; margin-right: 10px;">Tên Tập Phim:</h6>
				<input id="ep"  style="float: left; margin-right: 10px;" type="text" value="<?php echo $row['TenTapPhim']; ?> ">
			</div> 
			<div>
				<h6 style="margin-left: 10%">Link Phim: </h6>
				<textarea id="link" style="width: 50%; height: 30%; overflow: scroll; margin-left: 10%" ><?php echo $row['link']; ?></textarea>
			</div>
			<?php
				}
			}
			?>
			<input id="btn" type="button" name="" value="Thêm">
		</div>
	</div>
</body>
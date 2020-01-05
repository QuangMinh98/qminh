<?php
	session_start();
	$conn = new mysqli('localhost','root','','XemPhim');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "SELECT * FROM theloaiphim,theloai WHERE theloaiphim.MaTL=theloai.MaTL and theloaiphim.MaPhim ='".$_GET['id']."'";
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM phim WHERE MaPhim = '".$_GET['id']."'";
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
	<style type="text/css">
		th{
			padding: 40px 80px;
			border: 1px solid black;
		  	border-collapse: collapse;
		}
		.main button{
			background: #000033;
			color: #fff;
			width: 150px;
			height: 60px;
			margin-top: 50px;
			margin-left: 12.5%;
			border-radius: 15px 15px;
			-moz-border-radius: 15px 15px; /*Firefox*/
			-webkit-border-radius: 15px 15px;  /*Chrome và Safary*/
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
		<h2>Danh sách thể loại:</h2>
		<?php
	       	if ($result1 && $result1->num_rows > 0){
	            while($row1 = $result1->fetch_assoc()){
	  	?>
		<h2><?php echo $row1['TenPhim']; ?></h2>
		<?php
			}
		}
		?>
		<a href="admin-add-theloaiphim.php?id=<?php echo $_GET['id']; ?>"><button>Thêm thể loại mới</button> </a>
			<table class="value">
				<tr>
					<th>Mã Thể Loại</th>
					<th>Tên Thể Loại</th>
					<th>Delete</th>
				</tr>
				<?php
	            if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	          	?>
	          	<tr>
	          		<td><?php echo $row['MaTL']; ?></td>
	          		<td><?php echo $row['TenTL']; ?></td>
	          		<td><a id="delete" href="admin-delete-theloaiphim.php?id=<?php echo $_GET['id']; ?>&tl=<?php echo $row['MaTL']; ?>"><img src="./Image/rubbish-bin.png" /></a></td>
	          	</tr>
	          	<?php
			          	}
			      	}
	          	?>
			</table>
	</div>
</body>
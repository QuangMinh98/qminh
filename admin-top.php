<?php
	session_start();
	$conn = new mysqli('localhost','root','','XemPhim');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "SELECT * FROM phim";
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
		<h2>Danh sách phim</h2>
		<a href="admin-add-film.php"><button>Thêm phim mới</button> </a>
			<table class="value">
				<tr>
					<th>Mã Phim</th>
					<th>Tên Phim</th>
					<th>Năm SX</th>
					<th>Hãng SX</th>
					<th>Tình Trạng</th>
					<th>Image</th>
					<th>Background Image</th>
					<th>Edit</th>
					<th>Delete</th>
					<th>Thể Loại</th>
				</tr>
				<?php
	            if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	          	?>
	          	<tr>
	          		<td><?php echo $row['MaPhim']; ?></td>
	          		<td><a id="id" href="admin-chitiet.php?id=<?php echo $row['MaPhim']; ?>"><?php echo $row['TenPhim']; ?></a></td>
	          		<td><?php echo $row['Nam']; ?></td>
	          		<td><?php echo $row['HangSX']; ?></td>
	          		<td><?php echo $row['TinhTrang']; ?></td>
	          		<td><?php echo "<img style='width:60px; height:80px; ' src=".$row['Image']." />"; ?></td>
	          		<td><?php echo "<img style='width:80px; height:45px; ' src=".$row['back_image']." />"; ?></td>
	          		<td><a href="admin-edit-film.php?id=<?php echo $row['MaPhim']; ?>"><img src="./Image/pencil-edit-button.png" /></a></td>
	          		<td><a href="admin-delete-phim.php?id=<?php echo $row['MaPhim']; ?>"><img src="./Image/rubbish-bin.png" /></a></td>
	          		<td><a href="admin-phim-theloai.php?id=<?php echo $row['MaPhim']; ?>"><img src="./Image/add-icon.png" /></a></td>
	          	</tr>
	          	<?php
			          	}
			      	}
	          	?>
			</table>
	</div>
</body>
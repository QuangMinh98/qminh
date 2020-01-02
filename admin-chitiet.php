<?php
	$conn = new mysqli('localhost','root','','XemPhim');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "SELECT * FROM tapphim WHERE MaPhim ='".$_GET['id']."'";
    $result = $conn->query($sql);
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
			<li style="background: #0033ff ;"><a style="color: #fff;" href="#" class="active">Phim</a></li>
		    <li><a href="#" class="active">Thể Loại</a></li>
		    <li><a href="#" class="active">Năm</a></li>
		    <li><a href="#" class="active">Tài Khoản</a></li>
		    <li><a href="#" class="active">Trang Người Dùng</a></li>
		</ul>
	</div>
	<div class="main">
		<h2>Danh sách tập phim</h2>
		<a href="#"><button>Thêm phim mới</button> </a>
			<table class="value">
				<tr>
					<th>Mã Tập Phim</th>
					<th>Tên Tập Phim</th>
					<th>Link Phim</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
	            if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	          	?>
	          	<tr>
	          		<td><?php echo $row['MaTapPhim']; ?></td>
	          		<td><?php echo $row['TenTapPhim']; ?></td>
	          		<td><?php echo $row['link']; ?></td>
	          		<td><a href="#"><img src="./Image/pencil-edit-button.png" /></a></td>
	          		<td><a href="#"><img src="./Image/rubbish-bin.png" /></a></td>
	          	</tr>
	          	<?php
			          	}
			      	}
	          	?>
			</table>
	</div>
</body>
<!DOCTYPE html>
<html lang="en">

<?php
	session_start();
    $conn = new mysqli('localhost','root','','XemPhim');
    mysqli_query($conn,'SET NAMES UTF8');
    // Check connection
    if(!$conn){
        die("Kết nối thất bại". mysqli_connect_error($conn));
    }
    $sql = "SELECT * FROM theloai";
    $result = $conn->query($sql);
    $sql1= "SELECT * FROM namsx";
    $result1 = $conn->query($sql1);
?>
<head>
	<meta charset="utf-8">
	<title>Thế giới phim truyện</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<script src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#favorite').click(function(){
				console.log("thành công");
				var id = "<?php echo $_GET['id']; ?>";
				var user = "<?php echo $_SESSION['id']; ?>";
				var query = "insert into phimyeuthich values('"+id+"','"+user+"')";
				$.ajax({
					url: 'insert.php',
					type: 'POST',
					data: {query:query},
					success:function(d){
						alert(d);
					},
					error:function(){
						alert("Bị lỗi");
					}
				})
			})
		})
	</script>
</head>
<body>
	<div class="container">
		<div class="menu">
			<div class="row">
				<img style="margin-left: 50px;" src="Image/logo.png">
				<form id = "demo-2" action="search.php" method="GET" class="search">
					<input type="search" name="search" placeholder="Search">
				</form>
				<?php 
					if(isset($_SESSION['id']))
					{
				 ?>
				 <a href="#"><?php echo $_SESSION['id']; ?></a>
				 <a href="logout.php">/Đăng xuất</a>
				<?php
					}
					else{
				?>
				<a href="login.php">Đăng nhập</a>
				<?php
				}
				?>
			</div>
			<ul style="margin-top: 30px;">
				<li><a href="index.php">Trang Chủ</a></li>
				<li><a href="#">Thể Loại</a>
					<ul>
						<div class="row">
							<?php
							if ($result && $result->num_rows > 0) {
        					// nếu có thì tiến hành lặp để in ra dữ liệu           
       							while ($row = $result->fetch_assoc()) {	
       								echo "<div class='col-xs-12 col-sm-12 col-md-3'>
       										<li style='padding: 8px 15px'>
       											<a href=theloai.php?id=".$row['MaTL'].">".$row['TenTL']."</a>
       										</li>
       									</div>";
       							}
       						}
							?>
						</div>
					</ul>
				</li>	
				<li><a href="#">Năm Phát Hành</a>
					<ul>
						<div class="row">
							<?php
							if ($result1 && $result1->num_rows > 0) {
        					// nếu có thì tiến hành lặp để in ra dữ liệu           
       							while ($row1 = $result1->fetch_assoc()) {	
       								echo "<div class='col-xs-12 col-sm-12 col-md-3'>
       										<li style='padding: 8px 15px'>
       											<a href=nam.php?nam=".$row1['Nam'].">".$row1['Nam']."</a>
       										</li>
       									</div>";
       							}
       						}
							?>
						</div>
					</ul>
				</li>
				<li><a href="#">Tình Trạng</a>
					<ul style="width: 182px;">
	       						<li style='padding: 8px 15px'>
	       							<a href="tinhtrangphim.php?tinhtrang=0">Đang Tiến Hành</a>
	       						</li>
	       						<li style='padding: 8px 15px'>
	       							<a href="tinhtrangphim.php?tinhtrang=1">Hoàn Thành</a>
	       						</li>
					</ul>
				</li>
				<?php 
					if(isset($_SESSION['id'])){
				 ?>
				<li><a href="phimyeuthich.php">Danh Sách Phim Yêu Thích</a></li>
				<?php
					}
					else{
				?>
				<li><a href="" onclick="javacript:login();return false;">Danh Sách Phim Yêu Thích</a></li>
				<?php
					}
				?>
				<script type="text/javascript">
					function login() {
						alert("Đăng nhập để sử dụng chức năng này");
					}
				</script>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
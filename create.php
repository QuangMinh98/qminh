<?php
	$conn = new mysqli('localhost','root','','XemPhim');
	mysqli_query($conn,'SET NAMES UTF8');
	// Check connection
	if(!$conn){
        die("Kết nối thất bại". mysqli_connect_error($conn));
	}
	$sql = "insert into taikhoan values('".$_POST['id']."','".$_POST['pass']."')";
	$result = $conn->query($sql);
	header('location: http://localhost:8888/qminh/login.php');
?>
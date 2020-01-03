<?php
	$conn = new mysqli('localhost','root','','XemPhim');
	mysqli_query($conn,'SET NAMES UTF8');
	// Check connection
	if(!$conn){
        die("Kết nối thất bại". mysqli_connect_error($conn));
	}
	$sql = $_POST['query'];
	$result = $conn->query($sql);
	echo "Đã chỉnh sửa";
?>
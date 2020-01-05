<?php
	$conn = new mysqli('localhost','root','','XemPhim');
	mysqli_query($conn,'SET NAMES UTF8');
	// Check connection
	if(!$conn){
        die("Kết nối thất bại". mysqli_connect_error($conn));
	}
	/*$sql1 = $_POST['test'];
	$result1 = $conn->query($sql1);
	while ($row = $result1->fetch_assoc()) {
		if($row['SoLuong'] > 0)
			echo "Thất bại, mã đã tồn tại";
		else{
				$sql = $_POST['query'];
				$result = $conn->query($sql);
				echo "Thành công";		
			}
	}*/
	$sql = $_POST['query'];
	$result = $conn->query($sql);
	if(!$result)
		echo "Mã đã tồn tại , không thể hoàn thành thao tác";
	else
		echo "Thành công";
?>
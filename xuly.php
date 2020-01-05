<?php
	session_start();
	$conn = new mysqli('localhost','root','','XemPhim');
	mysqli_query($conn,'SET NAMES UTF8');
	if(isset($_POST['btn']))
	{
		if($_POST['id'] == 'admin' && $_POST['pass'] == 'admin')
		{
			$_SESSION['id'] = $_POST['id'];
			header('Location: http://localhost:8888/qminh/admin-top.php');	
		}
		else{
			$sql = "select count(*) as soluong from taikhoan where id='".$_POST['id']."' and password='".$_POST['pass']."'";
			$result = $conn->query($sql);
			$i = 0;
			if ($result && $result->num_rows > 0){
			    while($row = $result->fetch_assoc()){
			    	$i = $row['soluong'];
			    }
			}
			if($i == 1)
			{
				$_SESSION['id'] = $_POST['id'];
				header('Location: http://localhost:8888/qminh/index.php');
			}
			else
			{
				echo 'Sai tên đăng nhập hoặc mật khẩu';
				header('Location: http://localhost:8888/qminh/login.php');
			}
		}
	}
?>
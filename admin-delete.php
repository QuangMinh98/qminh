<?php
	$conn = new mysqli('localhost','root','','XemPhim');
    mysqli_query($conn,'SET NAMES UTF8');
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "delete from theloaiphim where MaPhim='".$id."'";
        $sql1 = "delete from tapphim where MaPhim='".$id."'";
        $sql2 = "delete from phimyeuthich where MaPhim='".$id."'";
        $sql4 = "delete from phimdangxem where MaPhim ='".$id."'";
        $sql3 = "delete from phim where MaPhim='".$id."'";
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);
        echo "Xóa thành công";
    }
    if(isset($_POST['MaPhim']) && isset($_POST['MaTL'])){
        $maphim = $_POST['MaPhim'];
        $tl = $_POST['MaTL'];
        $sql4 = "delete from theloaiphim where MaPhim='".$maphim."' and MaTL='".$tl."'" ;
        $result4 = $conn->query($sql4);
        echo "Xóa thành công";
    }
    if(isset($_POST['TL']))
    {   
        $id = $_POST['TL'];
        $sql = "delete from theloaiphim where MaTL='".$id."'";
        $sql1 = "delete from theloai where MaTL ='".$id."'";
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        echo "Xóa thành công";
    }
    if(isset($_POST['ep'])){
        $id = $_POST['ep'];
        $sql = "delete from tapphim where MaTapPhim=".$id."";
        $result = $conn->query($sql);
        echo "Xóa thành công";
    }
    if(isset($_POST['nam'])){
        $id = $_POST['nam'];
        $sql1 = "select * from phim where Nam =".$id;
        $result1 = $conn->query($sql1);
         if ($result1 && $result1->num_rows > 0) {               
                while ($row1 = $result1->fetch_assoc()) {
                    $sql3 ="delete from tapphim where MaPhim='".$row1['MaPhim']."'";
                    $result3 = $conn->query($sql3);
                    $sql4 = "delete from theloaiphim where MaPhim ='".$row1['MaPhim']."'";
                    $result4 = $conn->query($sql4);
                    $sql5 = "delete from phimyeuthich where MaPhim ='".$row1['MaPhim']."'";
                    $result5 = $conn->query($sql5);
                    $sql6 = "delete from phimdangxem where MaPhim ='".$row1['MaPhim']."'";
                    $result6 = $conn->query($sql6);
                }
            }
        $sql2 = "delete from phim where Nam =".$id;
        $result2 = $conn->query($sql2);        
        $sql = "delete from namsx where Nam =".$id;
        $result = $conn->query($sql);
        echo "Xóa thành công";
    }
    if(isset($_POST['user'])){
        $id = $_POST['user'];
        $sql2 = "delete from phimyeuthich where id='".$id."'";
        $result2 = $conn->query($sql2);
        $sql = "delete from taikhoan where id ='".$id."'";
        $result = $conn->query($sql);
        echo "Xóa thành công";
    }
?>
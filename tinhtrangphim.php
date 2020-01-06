<?php
    include 'top.php';
?>
    <div class="container">
		<div class="item">
            <div class="title">
                <h2>Danh Sách Phim</h2>
                <hr>
            </div>
			<div class="row">
                <?php
                if($_GET['tinhtrang']==0){
                    $sql = "SELECT * FROM phim WHERE TinhTrang = 'Đang Tiến Hành' ORDER BY TenPhim";
                }
                if($_GET['tinhtrang']==1){
                    $sql = "SELECT * FROM phim WHERE TinhTrang = 'Hoàn Thành' ORDER BY TenPhim";
                }
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {               
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class=col-lg-2 col-md-3 col-sm-4>
                                <div class=film>
                                    <a href=detail.php?id=".$row['MaPhim'].">
                                        <img src=".$row['Image']." alt=img2>
                                    </a>
                                    <h3><a href=detail.php?id=".$row['MaPhim'].">".$row['TenPhim']."</a></h3>
                                </div>
                            </div>";
                    }
                } else
                    echo 'Không thành công. Lỗi' . $conn->error;
                $conn->close();
                ?>
            </div>
		</div>
        <?php
        include 'bottom.php';
        ?>
	</div>
</body>
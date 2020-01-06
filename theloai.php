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
                $sql = "SELECT theloaiphim.MaPhim,phim.TenPhim,phim.Image FROM phim,theloaiphim WHERE phim.MaPhim=theloaiphim.MaPhim AND theloaiphim.MaTL='".$_GET['id']."'";
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
                    echo 'Không có phim tồn tại' . $conn->error;
                $conn->close();
                ?>
            </div>
		</div>
        <?php
        include 'bottom.php';
        ?>
	</div>
</body>
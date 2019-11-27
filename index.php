<?php
    include 'top.php';
?>
    <section class="recent-book-sec">
        <div class="container">
            <div class="title">
                <h2>Danh sách phim</h2>
                <hr>
            </div>
            <div class="row">
            <?php
                //câu truy vấn
                $sql = "SELECT * FROM phim";
                //run câu truy vấn
                $result = $conn->query($sql);
                //kiểm tra xem có dữ liệu trả vê không
                if ($result && $result->num_rows > 0) {
                    // nếu có thì tiến hành lặp để in ra dữ liệu
                   
                    while ($row = $result->fetch_assoc()) {
                        //hiển thị dữ liệu
                        echo "<div class=col-lg-2 col-md-3 col-sm-4>
                        <div class=item>
                            <a href=detail.php?id=".$row['MaPhim'].">
                                <img src=".$row['Image']." alt=img>
                            </a>
                            <h3><a>".$row['TenPhim']."</a></h3>
                        </div>
                        </div>";
                        //tăng $i lên 1
                    }
                } else
                    //Hiện thông báo khi không thành công
                    echo 'Không thành công. Lỗi' . $conn->error;
                //ngắt kết nối
                $conn->close();
            ?>
            </div>
        </div>
    </section>
<?php
    include 'bottom.php';
?>
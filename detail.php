<?php
    include 'top.php';
    
?>

<div class="breadcrumb">
    <section class="product-sec">
        <div class="container">
        <?php
                //câu truy vấn
                $sql = "SELECT * FROM phim WHERE MaPhim = '".$_GET['id']."'";
                //run câu truy vấn
                $result = $conn->query($sql);
                //kiểm tra xem có dữ liệu trả vê không
                if ($result && $result->num_rows > 0) {
                    // nếu có thì tiến hành lặp để in ra dữ liệu
                   
                    while ($row = $result->fetch_assoc()) {
                        //hiển thị dữ liệu
                        echo "<h1>".$row['TenPhim']."</h1>
                        <div class=row>
                            <div class=col-md-6 slider-sec>
                                <div id=myCarousel class=carousel slide>
                                    <div class=carousel-inner>
                                        <div class=active item carousel-item data-slide-number=0>
                                            <img src=".$row['Image']." class=img-fluid>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=col-md-6 slider-content>
                                <p>".$row['NoiDung']."</p>
                                <ul>
                                    <li>
                                        <span class=name>Năm Sản Xuất</span><span class=clm>:</span>
                                        <span class=price>".$row['Nam']."</span>
                                    </li>
                                    <li>
                                        <span class=name>Hãng Sản Xuất</span><span class=clm>:</span>
                                        <span class=price>".$row['HangSX']."</span>
                                    </li>
                                </ul>
                                <div class=btn-sec>
                                <a href=view.php?id=".$row['MaPhim']."&ep=01>
                                    <button class=btn>Xem Phim</button>
                                </a>
                                    <button class=btn black>Thêm vào yêu thích</button>
                                </div>
                            </div>
                        </div>";
                    }
                } else
                    //Hiện thông báo khi không thành công
                    echo 'Không thành công. Lỗi' . $conn->error;
                //ngắt kết nối
                $conn->close();
            ?>
            
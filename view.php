<?php
    include 'top.php'
?>
<div class="players" id="players" style="opacity: 1; height: 450px;">
    <span style="position: absolute;right: 3px;width: 55px;height: 55px;"></span>
    <div class=" tab-pane-active" id="player_1" style="display: none;">
        <div id="myElement"></div>
    </div>
    <?php
        $sql = "SELECT * FROM tapphim WHERE MaPhim = '".$_GET['id']."' AND TenTapPhim = '".$_GET['ep']."'";
        //run câu truy vấn
        $result = $conn->query($sql);
        //kiểm tra xem có dữ liệu trả vê không
        if ($result && $result->num_rows > 0) {
            // nếu có thì tiến hành lặp để in ra dữ liệu
        
            while ($row = $result->fetch_assoc()) {
                echo "<video controls=controls width=100% height=100% src=".$row['link']." frameborder=0 allow=autoplay allowfullscreen = >
                    
                </video>";
            }
        }
        $sql1 = "SELECT * FROM tapphim WHERE MaPhim = '".$_GET['id']."'";
        //run câu truy vấn
        $result1 = $conn->query($sql1);
        if ($result1 && $result1->num_rows > 0) {
            // nếu có thì tiến hành lặp để in ra dữ liệu
            echo "<div class=col-xs-12 col-sm-12 col-md-12>
                    <div class=eplist id=_listep>
                        <ul class=listep id=sv_0>
                            <li class=svep id=sv_animetvn><span class=svname>Tập phim</span>";
        
            while ($row1 = $result1->fetch_assoc()) {
                if($row1['TenTapPhim'] == $_GET['ep']){
                    echo "<a id=ep_160352 class=playing href= onclick= data-title= title= >".$row1['TenTapPhim']."</a>
                            </li>
                        </ul>
                    </div>
                </div>";
                }
                else{
                    echo "<a id=ep_160352 class=tapphim href= onclick= data-title= title= >".$row1['TenTapPhim']."</a>
                    </li>
                    </ul>
                </div>
            </div>";
                }
            }
        }
    ?>

</div>

<?php
	include 'top.php';
	$sql = "SELECT * FROM tapphim WHERE MaPhim = '".$_GET['id']."'";
	$sql1 = "SELECT * FROM tapphim WHERE MaPhim = '".$_GET['id']."' and TenTapPhim=".$_GET['ep'];
                //run câu truy vấn
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
?>

	<div class="container">
		<div class="item">
			<div class="frame">
				<?php
					$sql2="SELECT * FROM phim WHERE MaPhim='".$_GET['id']."'";
					$result2 = $conn->query($sql2);
					if ($result2 && $result2->num_rows > 0) {
        			// nếu có thì tiến hành lặp để in ra dữ liệu           
       					 while ($row2 = $result2->fetch_assoc()) {
							echo "<h4>".$row2['TenPhim']." Tập ".$_GET['ep']."</h4>";
						}
					}
					if ($result1 && $result1->num_rows > 0) {
        			// nếu có thì tiến hành lặp để in ra dữ liệu           
       					 while ($row1 = $result1->fetch_assoc()) {
       					 	echo "<video src=".$row1['link']."  controls=controls class=video autoplay=yes></video> ";
       					}
       				}
				?>
				<!--<iframe src="http://localhost:88/Movies/video.php?server=&link=https://lh3.googleusercontent.com/Ji7EUoY8JBCO-o4q5ZKKSIL9ZiUv1e-iP9dKzj9u4GnP095DEUaV83j1blGYkkjM_fRiLdl5KgcdcubIY7oq5jhYJtPXWhg_v6cmhZNobeG2GQkH4UEC9NXjLMkgEKFnm8Jds-KhKgU=m22" class="video" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>-->
				<div class="listep">
					<span class="svname">Tập phim</span>
					<?php
						if ($result && $result->num_rows > 0) {
        				// nếu có thì tiến hành lặp để in ra dữ liệu           
       						while ($row = $result->fetch_assoc()) {	
       							if($row['TenTapPhim']==$_GET['ep'])
       								echo "<a href=view.php?id=".$row['MaPhim']."&ep=".$row['TenTapPhim']." class='tapphim playing'>".$row['TenTapPhim']."</a>";
       							else
       								echo "<a href=view.php?id=".$row['MaPhim']."&ep=".$row['TenTapPhim']." class=tapphim>".$row['TenTapPhim']."</a>";
       						}
       					}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
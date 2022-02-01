<?php
	ob_start();
	session_start();
?>
<html lang="en">


<head>
	<?php include("template/link.php")  ?>
	<script>
		
		function hamDropdown() {
			document.querySelector(".dropdown-genes").classList.toggle("hienThi");
		}

			window.onclick = function(e) {
			if (!e.target.matches('.header')) {
			var noiDungDropdown = document.querySelector(".dropdown-genes");
				if (noiDungDropdown.classList.contains('hienThi')) {
				noiDungDropdown.classList.remove('hienThi');
				}
			}
			}
		
	</script>
</head>

<body>

		<?php include("template/header.php") ?>
	
	<div class="clear">
		<div class="wrap-content-top">
		<div class="header-content-top">
			<div class="title">Truyện mới</div>
		</div>
		<div class="body-content-top">
			<ul  class="list-story-top">
				<?php 
				
					$result_news = mysqli_query($conn, "SELECT * FROM truyen ORDER BY `LastUpdate` DESC LIMIT 6");
					if($result_news){
						while($row_n= mysqli_fetch_assoc($result_news)){
							echo '
								<li class="item">
									<a href="Thongtintruyen.php?id='.$row_n['IDTRUYEN'].'" class="list-item"><img src="data:image/jpeg;charset=utf8;base64,'.$row_n['ANHDAIDIENTRUYEN'].'" alt=""></a>
									<div class="infor-bottom">
										<a href="#" class="infor-truyen">'.$row_n['TENTRUYEN'].'</a>
										<span>Chap '.$row_n['LastChapter'].'</span>
										
									</div>
								</li>
							
							
							';
						}
					}
				
				?>
				
			</ul>
		</div>
	</div>

	</div>
	
	<div class="wrap-content-top">
		<!-- =================================Thua toan phan trang ================================= -->
		<?php 
			include 'template/connect.php'; // nối database
			// BƯỚC 2: TÌM TỔNG SỐ RECORDS
			$result = mysqli_query($conn, "SELECT count(IDTRUYEN) AS total FROM truyen");
			$row = mysqli_fetch_assoc($result);
			$total_records = $row['total'];
			// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
			$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = 12;						
			// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
			// tổng số trang
			$total_page = ceil($total_records / $limit);
			
			// Giới hạn current_page trong khoảng 1 đến total_page
			if ($current_page > $total_page){
				$current_page = $total_page;
			}
			else if ($current_page < 1){
				$current_page = 1;
			}
			$start = ($current_page - 1) * $limit;
			
			$result = mysqli_query($conn, "SELECT * FROM truyen ORDER BY RAND() LIMIT $start, $limit");

		?>

		<div class="header-content-top">
			<div class="title">Mới cập nhật</div>
		</div>
		<div class="body-content-top">
			<ul  class="list-story-top">
				<?php 
					// $date= date('H-i-s , j-m-Y');
					// include 'template/connect.php';
					// $sql="SELECT * FROM truyen";
					// $rs= $conn->query($sql);
					
						while($row = mysqli_fetch_assoc($result)){
							// $ld=$row['LastUpdate'];
							// $count= strtotime( -$ld , strtotime($date));
							echo ' <li class="item">
							<a href="Thongtintruyen.php?id='.$row['IDTRUYEN'].'" class="list-item"><img src="data:image/jpeg;charset=utf8;base64,'.$row['ANHDAIDIENTRUYEN'].'" alt=""></a>
							<div class="infor-bottom">
								<a href="Thongtintruyen.php?id='.$row['IDTRUYEN'].'" class="infor-truyen">'.$row['TENTRUYEN'].'</a>
								<span> Chapter '.$row['LastChapter'].' </span>
							</div>
						</li> ';
						}
					
				
				?>
			</ul>
		</div>
		<!-- <div class="notify">
			<div class="btn-more">
				<a href="#" class="btn">More</a>
			</div>
		</div> -->
		<div class="notify">
			<ul class="pages">
				<?php 
					// PHẦN HIỂN THỊ PHÂN TRANG
					if ($current_page > 1 && $total_page > 1){
						echo '<li><a class="disable" href="index.php?page='.($current_page-1).'"> << </a>   </li>';
					}
		
					// Lặp khoảng giữa			
					for ($i = 1; $i <= $total_page; $i++){
						// Nếu là trang hiện tại thì hiển thị thẻ span
						// ngược lại hiển thị thẻ a
						
						if ($i == $current_page){
							echo '<li class="active"><span>'.$i.'</span></li>';
						}
						else{
							echo ' <li> <a href="index.php?page='.$i.'">'.$i.'</a> </li> ';
						}
						
					}
					// echo ' <li> <span>...</span> </li> ';
					
					// echo ' <li> <a href="index.php?page='.$total_page.'">'.$total_page.'</a> </li> ';

					// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
					if ($current_page < $total_page && $total_page > 1){
						echo '<li><a href="index.php?page='.($current_page+1).'"> >> </a>  </li>';
					}
				?>
			</ul>           
        </div>		
	</div>
	

	<?php include("template/footer.php")?>
</body>
</html>
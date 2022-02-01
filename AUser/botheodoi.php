<?php
	include 'connect.php';
	if(isset($_REQUEST['idtk'])){
        $idtk = $_REQUEST['idtk'];
        $idtruyen= $_REQUEST['idtruyen'];
		$sql = "SELECT * FROM truyentheodoi WHERE IDTAIKHOAN='$idtk'";
		$query = $conn->query($sql);
		while ($row = $query->fetch_assoc()) {
			
				$sql = "DELETE FROM truyentheodoi WHERE `IDTAIKHOAN`=$idtk AND `IDTRUYEN`=$idtruyen'";
				$query = $conn->query($sql);
				if($query){
					echo "Đã xóa - ";
				}
			else{
				echo "Không được xóa - ";
			}
		}
	}
?>
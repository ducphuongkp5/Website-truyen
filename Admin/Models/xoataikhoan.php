<?php
	include '../template/connect.php';
	if(isset($_REQUEST['TENTAIKHOAN'])){
		$TENTAIKHOAN = $_REQUEST['TENTAIKHOAN'];
		$sql = "SELECT * FROM thongtintaikhoan WHERE TENTAIKHOAN='$TENTAIKHOAN'";
		$query = $conn->query($sql);
		while ($row = $query->fetch_assoc()) {
			if($row['QUYENTAIKHOAN']!='1'){
				$sql = "DELETE FROM thongtintaikhoan WHERE TENTAIKHOAN='$TENTAIKHOAN'";
				$query = $conn->query($sql);
				if($query){
					echo "Đã xóa - ";
				}
			}else{
				echo "Không được xóa - ";
			}
		}
	}
?>
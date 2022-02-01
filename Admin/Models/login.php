<?php
	session_start();
	include '../template/connect.php';
	if(isset($_REQUEST['SingIn'])){
		$taikhoan = $_POST['username'];
		$password = md5($_POST['password']);

		$sql = "SELECT * from thongtintaikhoan where QUYENTAIKHOAN = '1' and TENTAIKHOAN = '$taikhoan' and PASS='$password'";
		$query = [];
		try {
			$query = $conn->query($sql);
			
		} catch (Exception $e) {
			echo $e;
		}
		$num = $query->num_rows??0;
		if($num<0){
			echo "<script type='text/javascript'>alert('Tên tài khoản hoặc mật khẩu không đúng!');</script>";
		}
		else{
			$_SESSION['admin'] = $taikhoan;
			// print_r($_SESSION['admin']);
			header("Location: .index.php");
		}
	}
?>
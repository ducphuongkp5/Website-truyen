<?php
    
	$servername = "localhost";
	$database   = "qltruyen";
	$username   = "root";
	$password   = "";

	$conn = mysqli_connect($servername,$username,$password,$database)
    or die ("failed");
    

    if(isset($_POST['idtaikhoan'])){

        $id=$_POST['idtaikhoan'];
        $idtruyen=$_POST['idtruyen'];
        
        $rs2=mysqli_query($conn, "DELETE FROM truyentheodoi WHERE `IDTAIKHOAN`=$id AND `IDTRUYEN`=$idtruyen");
        
        if($rs2){
            echo 1;
        }
        else {
            echo 0;
        }
    }
?>
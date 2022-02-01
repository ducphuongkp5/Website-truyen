<?php
    
	$servername = "localhost";
	$database   = "qltruyen";
	$username   = "root";
	$password   = "";

	$conn = mysqli_connect($servername,$username,$password,$database)
    or die ("failed");
    

    if(isset($_POST['idtaikhoan'])){

        $id=$_POST['idtaikhoan'];
        $tinhtrang="Chua doc";
        $idtruyen= $_POST['idtruyen'];

        $rs=mysqli_query($conn, "INSERT INTO truyentheodoi(IDTAIKHOAN,IDTRUYEN,TINHTRANG) VALUES('$id','$idtruyen','$tinhtrang')");
       
        if($rs){
            echo 1;
        }
        else {
            echo 0;
        }
    }
?>
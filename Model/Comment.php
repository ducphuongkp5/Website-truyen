<?php
    
	$servername = "localhost";
	$database   = "qltruyen";
	$username   = "root";
	$password   = "";

	$conn = mysqli_connect($servername,$username,$password,$database)
    or die ("failed");
    
     
    if(isset($_POST['idtaikhoan'])){

         date_default_timezone_set('Asia/Ho_Chi_Minh');
         $tgcmt = date('Y/m/d H:i');

        $idtaikhoan=$_POST['idtaikhoan'];
        $idtruyen=$_POST['idtruyen'];
        $noidung=$_POST['noidung'];

        $sql_tk=mysqli_query($conn,"SELECT TENTAIKHOAN FROM thongtintaikhoan WHERE IDTAIKHOAN=$idtaikhoan");
        $rs_tk=mysqli_fetch_assoc($sql_tk);
        $tentaikhoan= $rs_tk['TENTAIKHOAN'];


        $sql_max=mysqli_query($conn,"SELECT MAX(IDCOMMENT) AS MAX FROM comment");
        $rs_max=mysqli_fetch_assoc($sql_max);
        $chapter=0;

        $idcmt= $rs_max['MAX'];
        $idcmt+=1;

        $rs=mysqli_query($conn, "INSERT INTO comment(IDCOMMENT,IDTAIKHOAN,TENTK,TGCOMMENT,NOIDUNGCOMMENT,IDTRUYEN,CHAPTER) VALUES('$idcmt','$idtaikhoan','$tentaikhoan','$tgcmt','$noidung','$idtruyen','$chapter')");
       
        if($rs){
            echo 1;
        }
        else {
            echo 0;
        }

    
     }
     else {
         echo isset($_POST['idtaikhoan']);
     }
    

?>
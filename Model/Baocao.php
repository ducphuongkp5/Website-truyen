<?php 
    $check=$_SESSION['username']??"";
    include '../template/connect.php';
    if(isset($_REQUEST['IDCOMMENT'])){

        $sql_max_id=mysqli_query($conn,"SELECT MAX(IDVIPHAM) FROM vipham");
        $rs_max_id=mysqli_fetch_assoc($sql_max_id);
        $id= $rs_max_id['MAX']+1;

        $idcomment= $_POST['IDCOMMENT'];
        $idtk=$check;
        $noidung="bi bao cao comment!";
        $tinhtrang="Chua xu li $idcomment";

        $rs=mysqli_query($conn, "INSERT INTO vipham VALUES('$id','$idtk','$noidung','$tinhtrang')");
        if($rs){
            echo 1;
        }
        else {
            echo 0;
        }
    }
    else {
        echo "chua bao cao dc";
    }

?>
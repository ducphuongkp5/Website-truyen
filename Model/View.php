<?php 
    include('./template/connect.php');

    if(!isset($_GET['id'])) $_SESSION['view']=0;
    else{ 
        
    $sql_view = "UPDATE chap SET VIEWCHAPTER=VIEWCHAPTER+1 WHERE CHAPTER='".$_GET['chap']."' AND IDTRUYEN='".$_GET['id']."' ";
    $result_view = $conn->query($sql_view);

    $sql_view_tr = "UPDATE chap SET VIEW=VIEW+1 WHERE IDTRUYEN='".$_GET['id']."' ";
    $result_view_tr = $conn->query($sql_view_tr);

    }
    
    // $result_view = $conn->query($sql_view);
    //  $sql_view = "UPDATE 'chapter' SET 'VIEWCHAPTER'= 'VIEWCHAPTER'+{$SESSTION['view']} WHERE `IDCHAPTER`= {$_GET['id']}" ;
    


?>
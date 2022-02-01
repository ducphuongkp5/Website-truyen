<?php 

    $idtk=$_GET['idtk'];
    $idtruyen=$_GET['id'];
    $time=getdate();
    $tinhtrang= 'Chưa đọc';

    $result_follow= mysqli_query($conn,"INSERT INTO truyentheodoi VALUES ($idtk, $idtruyen, $time, $tinhtrang)");
    $truyen= mysqli_fetch_assoc($result_follow);

?>
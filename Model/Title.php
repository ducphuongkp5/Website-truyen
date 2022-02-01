<?php 
    include('template/connect.php');
    $idtruyen= $_GET['id'];
    $result_truyen= mysqli_query($conn,"SELECT * FROM truyen WHERE IDTRUYEN = ".$_GET['id']);
    $truyen= mysqli_fetch_assoc($result_truyen);
    $title= $truyen['TENTRUYEN'];

    $ten=$truyen['TENKHAC'];
    
    $theloai= $truyen['THELOAITRUYEN'];
    
    $tacgia=$truyen['TACGIA'];
    $trangthai=$truyen['TINHTRANG'];

    $result_rating= mysqli_query($conn,"SELECT * FROM danhgiatong WHERE IDTRUYEN = ".$_GET['id']);
    $rating_rs=mysqli_fetch_assoc($result_rating);
    if($rating_rs== NULL){
        $rating=0;
    }
    else{
        $rating=$rating_rs['TONGDANHGIA'];
    }

    $result_comment= mysqli_query($conn,"SELECT COUNT(IDCOMMENT) FROM comment WHERE IDTRUYEN=".$_GET['id']);
    $result_bookmark= mysqli_query($conn,"SELECT COUNT(IDTAIKHOAN) FROM truyentheodoi WHERE  IDTRUYEN=".$_GET['id']);
                        
    $book= mysqli_fetch_assoc($result_bookmark);
    $com= mysqli_fetch_assoc($result_comment);


?>
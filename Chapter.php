<?php 
    ob_start();
    session_start();
    include("Model/View.php");
    include('template/connect.php');
    include('Model/Slug.php');

    $result_truyen= mysqli_query($conn,"SELECT * FROM truyen WHERE IDTRUYEN = ".$_GET['id']);
 

    $truyen= mysqli_fetch_assoc($result_truyen);


    $result_chapter= mysqli_query($conn,"SELECT * FROM chap WHERE IDTRUYEN = ".$_GET['id']);
    $chapter= mysqli_fetch_assoc($result_chapter);

   
    
    $result_view_truyen= mysqli_query($conn,"SELECT SUM(`VIEWCHAPTER`) AS SUM FROM `chap` WHERE `IDTRUYEN`=".$_GET['id']);
 

    $view_truyen= mysqli_fetch_assoc($result_view_truyen);
    $view= $view_truyen['SUM'];
    $idtruyen= $_GET['id'];

    $sql_update_view = "UPDATE truyen SET VIEW= $view WHERE IDTRUYEN= $idtruyen";
    $result_update_view = $conn->query($sql_update_view);
    
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title><?= $truyen['TENTRUYEN']?>- Chap <?=$_GET['chap']?></title>
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <!-- Site Icons -->
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- Site CSS -->

    <link rel="stylesheet" href="css/style-men.css">
    <link rel="stylesheet" href="css/reponsive.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <script defer src="/your-path-to-fontawesome/js/all.js"></script>
    <script src="http://kit.fontawesome.com/67c66657c7.js"></script>

    <!-- Responsive CSS -->
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <?php 
        include("template/header.php");

        $ten="SELECT `IDTRUYEN` FROM `truyen` WHERE `TENTRUYEN`=".$_GET['name'];
        $rs_ten=$conn->query($sql);

        
    ?>
    <div class="wrap-chapter">
        <div class="name-chap">
            <h3><a href="Thongtintruyen.php?id=<?= $truyen['IDTRUYEN']?>"><?= $truyen['TENTRUYEN']?></a>- Chap <?=$_GET['chap']?></h3>
        </div>
        <div class="ad">
            <p>AD </p>
        </div>
        <div class="menu-next">
            <div class="menu-left menu-right">
                <div class="wrap-select">
                    <select style="width:150px; height: 30px; border-radius:10px;bottom:0">
                        <?php
                            $sql = "SELECT * FROM chap WHERE IDTRUYEN = ".$_GET['id'];
                            $rs= $conn->query($sql);
                            if($rs->num_rows>0){
                                while ($row = $rs->fetch_assoc()){
                        ?>
                            <option value="<?=$row['CHAPTER']?>" >Chapter <?=$row['CHAPTER']?></option>   
                    <?php } }?>
                                                     
                           
                    </select>
                </div>
            </div>
            <div class="menu-right">

                <?php 
                        $rs_min=mysqli_query($conn,"SELECT MIN(`CHAPTER`) AS MIN FROM `chap` WHERE `IDTRUYEN`=".$_GET['id']);
                        $truyen_min= mysqli_fetch_assoc($rs_min);
                        $prev=$_GET['chap']-1;
                        

                        if($prev>=$truyen_min['MIN']){  
                                                   
                            echo '<a href="Chapter.php?id='.$truyen['IDTRUYEN'].'&name= '.to_slug( $truyen['TENTRUYEN']).'&chap='. $prev.'"> Truoc</a>
                            ';
                        }
                        else{
                            echo '<a href="Chapter.php?id='.$truyen['IDTRUYEN'].'&name='.to_slug( $truyen['TENTRUYEN']).'&chap='.$prev.'" style="display:none"> Trước</a>
                            ';
                        }
                
                ?>
                
                
                <?php 
                    $rsss=mysqli_query($conn,"SELECT MAX(`CHAPTER`) AS MAX FROM `chap` WHERE `IDTRUYEN`=".$_GET['id']);
                    $truyensdf= mysqli_fetch_assoc($rsss);
                    $next=$_GET['chap']+1;

                    

                    if($next <= $truyensdf['MAX']){

                        echo '<a href="Chapter.php?id='.$truyen['IDTRUYEN'].'&name='.to_slug( $truyen['TENTRUYEN']).'&chap='.$next.'"> Tiep</a>
                        ';
            
                    } 
                    else{
                        echo '<a href="Chapter.php?id='.$truyen['IDTRUYEN'].'&name='.to_slug( $truyen['TENTRUYEN']).'&chap='.$next.'" style="display:none"> Tiep</a>
                        ';
                    }  ?>

                
                </div>
        </div>
        <div class="entry-content">
            <div class="entry-content-wrap">
                <div class="reading" id="chapter-content">
                    <?php 
                        // $chap=$_GET['chap'];
                        // $truyen=$_GET['id'];
                        // $sql= "SELECT * FROM anh WHERE CHAPTER= $chap AND IDTRUYEN= $truyen";
                        // $rs= $conn->query($sql);
                        // if($rs->num_rows >0){
                        //     while($row = $rs->fetch_assoc()){
                        //         echo '
                        //         <div class="page-break" style="text-align: center;">
                        //             <img class="img-fluid" src="data:image/jpeg;charset=utf8;base64,'.$row['ANH'].'" alt="" />
                        //         </div>
                                
                        //         ';
                        //     }
                        // }
                        // else{
                        //     echo'
                        //     <div class="page-break" style="text-align: center;">
                        //         Lỗi chapter!
                        //     </div>';
                        // }

                        $chap=$_GET['chap'];
                        $truyen=$_GET['id'];
                        $sql= "SELECT * FROM upload WHERE CHAPTER= $chap AND IDTRUYEN= $truyen";
                        $rs= $conn->query($sql);
                        if($rs->num_rows >0){
                            while($row = $rs->fetch_assoc()){
                                echo '
                                <div class="page-break" style="text-align: center;">
                                    <img class="img-fluid" src="upload/'.$row['LINKCHUONG'].'/'.$row['TITLE'].'" alt="" />
                                </div>
                                
                                ';
                            }
                        }
                        else{
                            echo'
                            <div class="page-break" style="text-align: center;">
                                Lỗi chapter!
                            </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="menu-next">
            
            <!-- <div class="menu-right">

                <?php 
                        
                        if($prev>=$truyen_min['MIN']){  
                                                   
                            echo '<a href="Chapter.php?id='.$truyen['IDTRUYEN'].'&name= '.to_slug( $truyen['TENTRUYEN']).'&chap='. $prev.'"> Truoc</a>
                            ';
                        }
                        else{
                            echo '<a href="Chapter.php?id='.$truyen['IDTRUYEN'].'&name='.to_slug( $truyen['TENTRUYEN']).'&chap='.$prev.'" style="display:none"> Trước</a>
                            ';
                        }
                
                ?>
                
                
                <?php 
                    
                    if($next < $truyensdf['MAX']){

                        echo '<a href="Chapter.php?id='.$truyen['IDTRUYEN'].'&name='.to_slug( $truyen['TENTRUYEN']).'&chap='.$next.'"> Tiep</a>
                        ';
            
                    } 
                    else{
                        echo '<a href="Chapter.php?id='.$truyen['IDTRUYEN'].'&name='.to_slug( $truyen['TENTRUYEN']).'&chap='.$next.'" style="display:none"> Tiep</a>
                        ';
                    }  ?>

                
                </div>
        </div> -->
    </div>
    <?php 
        include 'template/footer.php';   
    ?>
</body>
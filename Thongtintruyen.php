<?php 
    session_start();
    include('Model/Slug.php'); 
    include('Model/Title.php');
    include('Model/Comment.php');
    include("template/connect.php");
    
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title><?= $title?></title>
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    

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
        
        // $id=$_GET['id'];
        // $sql= "SELECT * FROM truyen WHERE IDTRUYEN = ".$_GET['id'];$query = $conn->query($sql);   
    ?>
    <div class="wrap-content">
    <?php
        include("template/header.php");
        // $result_truyen= mysqli_query($conn,"SELECT * FROM truyen WHERE IDTRUYEN = ".$_GET['id']);
        // $truyen= mysqli_fetch_assoc($result_truyen);
        if($check){
            $rs_check_follow=mysqli_query($conn, "SELECT * FROM truyentheodoi WHERE `IDTAIKHOAN`=$idtaikhoan AND `IDTRUYEN`=$idtruyen");
            $check_follow= mysqli_fetch_assoc($rs_check_follow);
        }
        
       
       
    
    ?>
        <div class="name">
            <p class='title'><?= $truyen['TENTRUYEN']?></p>
        </div>
        <div class="sumary-content">
            <div class="wrap-content-img">
                <a href="#">
                    <img src="data:image/jpeg;charset=utf8;base64,<?= $truyen['ANHDAIDIENTRUYEN']?>" alt="" style="width: 180px;">
                </a>
            </div> 
            <div class="wrap-content-info">                           
                    <div class="post-content">

                        <div id="rating">

                            <input type="radio" id="star5" class="rating-item" name="rating" value="5" onclick="calcRate(document.getElementById('star5').value)"/>
                            <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            
                            <input type="radio" id="star4half" name="rating" value="4.5" onclick="calcRate(document.getElementById('star4half').value)"/>
                            <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            
                            <input type="radio" id="star4" name="rating" value="4" onclick="calcRate(document.getElementById('star4').value)"/>
                            <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            
                            <input type="radio" id="star3half" name="rating" value="3.5" onclick="calcRate(document.getElementById('star3half').value)"/>
                            <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            
                            <input type="radio" id="star3" name="rating" value="3" onclick="calcRate(document.getElementById('star3').value)"/>
                            <label class = "full" for="star3" title="Meh - 3 stars"></label>
                            
                            <input type="radio" id="star2half" name="rating" value="2.5" onclick="calcRate(document.getElementById('star2half').value)"/>
                            <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            
                            <input type="radio" id="star2" name="rating" value="2" onclick="calcRate(document.getElementById('star2').value)"/>
                            <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            
                            <input type="radio" id="star1half" name="rating" value="1.5" onclick="calcRate(document.getElementById('star1half').value)"/>
                            <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            
                            <input type="radio" id="star1" name="rating" value="1" onclick="calcRate(document.getElementById('star1').value)"/>
                            <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            
                            <input type="radio" id="starhalf" name="rating" value="0.5" onclick="calcRate(document.getElementById('starhalf').value)"/>
                            <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                        </div>

                        <div class="post-content-item">
                            <div class="sumary-header">
                                <h4>Tên khác</h4>
                            </div>
                            <div class="sumary-content-name">
                                <?=$ten?>
                            </div>
                        </div>
                        <div class="post-content-item">
                            <div class="sumary-header">
                                <h4>Thể loại</h4>
                            </div>
                            <div class="sumary-content-name">
                                <?=
                                   $theloai
                                ?>
                            </div>
                        </div>
                        <div class="post-content-item">
                            <div class="sumary-header">
                                <h4>Tác giả</h4>
                            </div>
                            <div class="sumary-content-name">
                                <?=$tacgia?>
                            </div>
                        </div>
                        <div class="post-content-item">
                            <div class="sumary-header">
                                <h4>Rating</h4>
                            </div>
                            <div class="sumary-content-name">
                                <?=$rating?>/5
                            </div>
                        </div>
                        <div class="post-content-item">
                            <div class="sumary-header">
                                <h4>Trạng thái</h4>
                            </div>
                            <div class="sumary-content-name">
                                <?=$trangthai?>
                            </div>
                        </div>
                    </div>  
                    <div class="status">

                        <div class="manga-action">
                            <div class="count-comment">
                                <div class="action-icon">
                                    <a href="#">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </div>
                                <div class="action-details">
                                    <span> <?= $com['COUNT(IDCOMMENT)']?> comment</span>
                                </div>
                            </div>
                            <div class="add-bookmark">
                                <div class="action-icon">
                                    <a href="#">
                                        <i class="fa fa-bookmark"></i>
                                    </a>
                                </div>
                            <div class="action-details">
                                <span> <?= $book['COUNT(IDTAIKHOAN)']?> add book</span>
                            </div>
                            </div>
                        </div>
                    </div>                  
            </div> 
                <?php
                    $result_chapter= mysqli_query($conn,"SELECT *, MIN(`CHAPTER`) AS MIN FROM chap WHERE IDTRUYEN = ".$_GET['id']);
                    $chapter= mysqli_fetch_assoc($result_chapter);
                    
                    if($chapter['MIN']){
                        $style='' ;  
                    }
                    else {
                        $style='style="display:none"';
                    }
                    if($truyen['LastChapter']){
                        $style='' ;  
                    }
                    else {
                        $style='style="display:none"';
                    }
 
                ?>  


                <form style="display:none" method="POST">
                    <input type="text" value="<?=$idtaikhoan?>" id="idfollow">
                    <input type="text" value="<?=$idtruyen?>" id="idtruyen">
                </form>
                
                <div id="btn-link" class="button-link">
                    <a href="Chapter.php?id=<?=$truyen['IDTRUYEN']?>&name=<?= to_slug($truyen['TENTRUYEN'])?>&chap=1" id="btn-read-first" <?=$style?> class="btn-read btn-more">Chap dau</a>
                    <a href="Chapter.php?id=<?=$truyen['IDTRUYEN']?>&name=<?= to_slug($truyen['TENTRUYEN'])?>&chap=<?= $truyen['LastChapter']?>" <?=$style?> id="btn-read-last" class="btn-read btn-more">Chap cuoi</a>
                    
                   <?php 
                         if($check){
                            if($check_follow>0){
                                echo ' <button name="unfollow" id="unfollow" class="btn-read btn-more" style="background-color:red!important;">
                                <i class="fa fa-times"></i> 
                                <span>Bỏ theo dõi</span>    
                            </button> ';
                            echo'<button name="follow" id="follow" class="btn-read btn-more" style="background-color: #4eb54e !important;display:none">
                                <i class="fa fa-heart"></i> 
                                <span>Theo dõi</span>    
                            </button>  ';
                            
                            }
                            else {
                                echo'<button name="follow" id="follow" class="btn-read btn-more" style="background-color: #4eb54e !important">
                                <i class="fa fa-heart"></i> 
                                <span>Theo dõi</span>    
                            </button>  ';
                            echo ' <button name="unfollow" id="unfollow" class="btn-read btn-more" style="background-color:red!important;display:none">
                                <i class="fa fa-times"></i> 
                                <span>Bỏ theo dõi</span>    
                            </button> ';
                            }
                         }
                         else{
                            echo'<button name="follow" id="follow" class="btn-read btn-more" style="background-color: #4eb54e !important">
                            <i class="fa fa-heart"></i> 
                            <span>Theo dõi</span>    
                        </button>  ';
                         }
                   ?>
                    
                            
                
                    
                    
                </div>
            
        
         </div>  
              
    </div>

    <div class="wrap-content-chapter">
        <div class="header-content-top">
			<div class="title" style="color: #2ea8f0; font-size: 20px!important;margin-bottom:20px;border-bottom: #ebebeb solid 1px">Nội dung</div>			
        </div>
        <div class="content-title">
            <div class="sumary-content" style="margin-left:10px">
                <p><?= $truyen['GIOITHIEU']?></p>
            </div>
        </div>
    </div>
   
    <div class="wrap-content-chapter">
        <div class="header-content-top">
			<div class="title" style="color: #2ea8f0; font-size: 20px!important;border-bottom: #ebebeb solid 1px">Các chương</div>			
		</div>
        <div class="body-content-top chapter" id="danhsachchuong">

        <?php 
            $sql = "SELECT * FROM chap WHERE IDTRUYEN = ".$_GET['id'];
            $rs= $conn->query($sql);
            if($rs->num_rows>0){
                while ($row = $rs->fetch_assoc()){
            

            
        ?>
            <li class="chap-item">
                <a href="Chapter.php?id=<?=$truyen['IDTRUYEN']?>&name=<?= to_slug($truyen['TENTRUYEN'])?>&chap=<?=$row['CHAPTER']?>" class="itemchapter">Chapter <?=$row['CHAPTER']?>
                <span><?=$row['LastUpdate']?></span>
                <span><?=$row['VIEWCHAPTER']?></span>
                </a>
                
            </li>
        <?php } }?>          
        </div>
        
    </div>

    <div class="comment wrap-content-chapter" style="height:auto">
        <div class="comment-section">
            <div class="header-content-top">
                <div class="title" style="color: #2ea8f0; font-size: 20px!important;margin-bottom:25px;border-bottom: #ebebeb solid 1px">Comment (<?=$com['COUNT(IDCOMMENT)']?>)</div>			
            </div>
            <div class="wrap-form-comment">
                <div class="gif-box">
                    <div class="gif-btn">
                        <a class="gif-item" onclick="addnoidung('ch01')">
                            <img src="images/gif/ch01.gif" alt="">
                        </a>
                        <button class="gif-item" onclick="addnoidung('capoo01')">
                            <img src="images/gif/capoo01.gif" alt="">
                        </button>
                        <button class="gif-item" onclick="addnoidung('echxanh')">
                            <img src="images/gif/echxanh.gif" alt="">
                        </button>
                        <button class="gif-item" onclick="addnoidung('qoobeeem001')">
                            <img src="images/gif/qoobeeem001.gif" alt="">
                        </button>
                    </div>
                </div>
                <div id="cmtli" class="comment-content" cols="40" rows="40" maxlength="500" placeholder="Noi dung">

                    <form method="POST">
                    <div class="cmt" style="overflow:scroll;max-height: 140px;border: solid 1px blanchedalmond;margin-bottom:20px">
                        
                        <div  id="noidungcmt" name="noidungcmt" contenteditable="true" style="overflow-y: hidden;font-size: 14px;padding-left: 1px;padding-right: 1px;  padding-bottom: 0px; display: block;min-height: auto;max-width: 800px" placeholder="Noi dung ">
                            

                        </div>	
                    </div>

                        <div class="btn-comment">
                            <div class="hint">
                                <span style="height:2.4rem; width:150px"><?= $check?></span>
                                
                            </div>
                            <button name="btn-comment" id="btn-comment" class="btn-button">
                                Comment
                            </button>
                            <br>
                        </div>
                    </form>

                    <div class="wrap-list-comment">
                        <div id="cmt-load" class="list-comment">
                            <ul class="list-comment">

                                <?php 
                                $result_comment= mysqli_query($conn,"SELECT thongtintaikhoan.TENTAIKHOAN,comment.IDCOMMENT, comment.TGCOMMENT, comment.NOIDUNGCOMMENT, thongtintaikhoan.AVATAR
                                FROM comment, thongtintaikhoan
                                WHERE comment.IDTAIKHOAN=thongtintaikhoan.IDTAIKHOAN
                                AND`IDTRUYEN`= ".$_GET['id']);

                                    while($comment= mysqli_fetch_assoc($result_comment)){
                                        echo'<li class="comment-item">                                    
                                        <div class="box-content" style="float: left;width: 100%;">
                                            <a class="wrap-avatar" style="float:left; width:9%">
                                                <img class="lazy-loaded" src="data:image/jpeg;charset=utf8;base64,'.$comment['AVATAR'].'" alt="avartar-default">
                                            </a>
                                            <div class="comment-button">
                                                    <button name="baocao" id="baocao" onclick="ConfirmBaocao(\''.$comment['IDCOMMENT'].'\')" class="btn-baocao btn-button btn-reply" style="background-color: red !important;">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                        
                                                    </button>
                                            </div>
                                            <h4 id="tentk">
                                                '.$comment['TENTAIKHOAN'].'
                                            </h4> 
                                            <!-- <p class="time">'.$comment['TGCOMMENT'].'</p> --!>
                                            <div class="comment"> 
                                            '.$comment['NOIDUNGCOMMENT'].'
                                                
                                            </div>
                                            
                                        </div>
                                    </li>
                                    
                                        ';
                                    }

                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <script>
		function addnoidung(name) {			 
			var t1=document.getElementById("noidungcmt").innerHTML;

			var gif2= '<img src="images/gif/';
			var d= name+'.gif">';
			var gif= gif2 + d;
			document.getElementById("noidungcmt").innerHTML=t1+  gif;

		}
	</script>  
<?php include("template/footer.php")?>
<script type="text/javascript">
    $('#btn-comment').on('click', function(){

        var idtaikhoan= $('#idfollow').val();
        var idtruyen=$('#idtruyen').val();

        
        var noidung=$('#noidungcmt').val();

        //ngày hiện tại
        // var today = new Date();
        
        // var date= today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear()+'-'today.getMinutes()+'-'+today.getHours();
        // Giờ, phút, giây hiện tại
        $.ajax({            
            url: "./Model/Comment.php",
            type: "POST",
            data:{idtaikhoan:idtaikhoan,idtruyen:idtruyen,noidung:noidung},            
            success:function(data){
                if(data==1){
                    alert("thanh cong!");
                }
                else{
                    // alert(idtruyen);
                    alert("Khong thanh cong!");
                }
            }
        })

    });
</script>
</body>

</html>
<script type="text/javascript">

    const follow= document.getElementById('follow');
    const unfollow=document.getElementById('unfollow');

    
    $('#follow').on('click', function(){
        
            var idtaikhoan= $('#idfollow').val();
            var idtruyen=$('#idtruyen').val();
            $.ajax({
                url: "./Model/Follow.php",
                method: "POST",
                data:{idtaikhoan:idtaikhoan,idtruyen:idtruyen},
                success:function(data){
                    if(data==1){
                        
                        follow.style.display="none";
                        unfollow.style.display="inline-block";
                        
                    }
                    else{
                        alert("Khong thanh cong!");
                    }
                }
            })
        
    });
    
    $('#unfollow').on('click', function(){
        var idtaikhoan= $('#idfollow').val();
        var idtruyen=$('#idtruyen').val();
           
        $.ajax({
            url: "./Model/UnFollow.php",
            method: "POST",
            data:{idtaikhoan:idtaikhoan,idtruyen:idtruyen},
            success:function(data){
                if(data==1){
                    
                    unfollow.style.display="none";
                    follow.style.display="inline-block";
                    
                    
                }
                else{
                    alert( "Khong thanh cong!");
                }
            }
        })
    });   
</script>

<script type="text/javascript">
        function calcRate(r){
            
            alert('Đã đánh giá! ' + r +' sao');
        }

</script>
<script>
          function ConfirmBaocao(IDCOMMENT) {
            var r = confirm("Bạn có thực sự muốn báo cáo không!");
            if(r==true){
                // alert("da vao");    
              $.post('Model/xBaocao.php', {'IDCOMMENT': IDCOMMENT}, function(data, textStatus, xhr) {
                item = data.split('-');
                alert(item[0]);
                location.reload();
              });
            }
            else{
                alert("khong");
            }
          }
          // else{
          //   location.reload();
          // }
</script>
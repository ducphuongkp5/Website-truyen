<?php
   function Theloai($slug){
        include('./template/connect.php');

        $tl= $slug;
        $result_slug= mysqli_query($conn,"SELECT * FROM `thongtintheloai` WHERE `Slug`= '$tl'");
        $truyen= mysqli_fetch_assoc($result_slug);

        $theloai= $truyen['THELOAITRUYEN'];
        
        $result = "SELECT * FROM `truyen` WHERE `THELOAITRUYEN` LIKE '%$theloai%'";
        
        $rs= $conn->query( $result );
        
        echo '
            <div class="module">
                    <h1>Thể loại truyện <strong> '.$theloai.' </strong></h1>
                    <div class="description">
                        <div class="info"> '.$truyen['NOIDUNGTHELOAI'].' </div>
                    </div>
            </div>
        ';
        echo '
            <div class="module-2">
                <div class="module-content">
                    <div class="module-items">
                        <div class="row">
        ';
       
        if($rs){
            while($row= $rs->fetch_assoc()){
                echo ' 
                    <div class="item" style="height:auto">
                       <div class="module-image">
                            <a href="Thongtintruyen.php?id='.$row['IDTRUYEN'].'">
                                <img src="data:image/jpeg;charset=utf8;base64,'.$row['ANHDAIDIENTRUYEN'].'" alt="" style="display: inline;">
                            </a>
                        </div>
                        <div class="figcaption">
                            <h3><a href="Thongtintruyen.php?id='.$row['IDTRUYEN'].'">'.$row['TENTRUYEN'].'</a></h3>
                            <ul>
                                <li class="module-chapter">
                                    <a href="#">Chap '.$row['LastChapter'].'</a>
                                    <i class="time">'.$row['LastUpdate'].'</i>
                                </li>
                            </ul>
                        </div>
                    </div>                                    
                        ';  
                    }
        }
        else{
            echo '
                <div class="info">
                    Chưa có thể loại truyên '.$theloai.' !
                </div>
            ';
        }
        echo '    
            </div>
                </div>
                    </div>
            </div>';
        

   }
?>  
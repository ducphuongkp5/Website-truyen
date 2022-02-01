<?php
    include('template/connect.php');
    $result = "SELECT * FROM `truyen` WHERE `TINHTRANG`='Hoàn Thành'";
    if($rs= $conn->query($result)){
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
                            <a href="#">Chapter '.$row['LastChapter'].'</a>
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
                Chưa có truyện hoàn thành!
            </div>
        ';
    }
    

?>                                      
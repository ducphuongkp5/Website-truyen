<?php 
    include ('./template/connect.php');

    if(isset($_REQUEST['search'])){

        $search= $_GET['search'] ;

        if (empty($search)) {
            echo "Yeu cau nhap du lieu vao o trong";
        } 
        else
        {
            
            $result = "SELECT * FROM `truyen` WHERE `TENTRUYEN` LIKE '%$search%'";
            
            $rs= $conn->query($result);
            echo '
                <div class="module">
                        <h1>Tìm kiếm liên quan đến <strong> '.$search.' </strong></h1>
                        
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
                        Chưa có truyện liên quan đến '.$sear.' !
                    </div>
                ';
            }
            echo '    
                </div>
                    </div>
                        </div>
                </div>';
            
        }
    }


?>

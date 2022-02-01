<?php


    $result_vipham = mysqli_query($conn, "SELECT thongtintaikhoan.TENTAIKHOAN,thongtintaikhoan.AVATAR,thongtintaikhoan.`IDTAIKHOAN`,COUNT(vipham.`IDVIPHAM`) as 'Soluong' 
    FROM `vipham`, thongtintaikhoan
    WHERE vipham.IDTAIKHOAN= thongtintaikhoan.IDTAIKHOAN
    GROUP BY `IDTAIKHOAN`
    ORDER BY 'Soluong'");

    $top=1;
    while($row_vipham= mysqli_fetch_assoc($result_vipham)){
        
        $soluong =$row_vipham['Soluong'];
        // while($row = mysqli_fetch_assoc($result)){
        if( $soluong <=2){
            $trangthai= 'progress-bar bg-gradient-success';
            $width='20%';
        }
        else if($soluong <=4){
            $trangthai= 'progress-bar bg-gradient-info';
            $width='40%';
        }
        else if($soluong <=6){
            $trangthai= 'progress-bar bg-gradient-warning';
            $width='60%';
        }
        else if($soluong <=8){
            $trangthai='progress-bar bg-gradient-primary';
            $width='80%';
        }
        else{
            $trangthai= 'progress-bar bg-gradient-danger';
            $width='100%';
        }
        echo '
            <tr>
                <td> '.$top.' </td>
                <td> 
                    <img class="lazy-loaded" src="data:image/jpeg;charset=utf8;base64,'.$row_vipham['AVATAR'].'" alt="avartar-default">
                     '.$row_vipham['TENTAIKHOAN'].' 
                </td>
                <td> '.$row_vipham['Soluong'].' </td>
                <td>
                <div class="progress">
                    <div class="'.$trangthai.'" role="progressbar" style="width: '.$width.'" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
                <td><i class="fa fa-ban"></i></td>
            </tr> 
        ';
        $top+=1;
    }
    
       
                           


?>
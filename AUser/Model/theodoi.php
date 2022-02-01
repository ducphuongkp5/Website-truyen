<?php 
    include './connect.php';
    include './Slug.php';
    $sql_theodoi="SELECT * FROM truyentheodoi, truyen WHERE truyentheodoi.IDTRUYEN=truyen.IDTRUYEN";

    $rs_theodoi=$conn->query($sql_theodoi);
    if($rs_theodoi->num_rows >0){
        while($row= $rs_theodoi->fetch_assoc()){
            echo '
                <tr>
                    <td>
                        <div class="manga">
                            <div class="item-thumb">
                                <a href="../Thongtintruyen.php?id='.$row['IDTRUYEN'].'">
                                    <img width="110" height="155px" src="data:image/jpeg;charset=utf8;base64,'.$row['ANHDAIDIENTRUYEN'].'" alt="">
                                </a>
                            </div>
                            <div class="info">
                                <div class="post-title">
                                    <h3><a href="../Thongtintruyen.php?id='.$row['IDTRUYEN'].'">'.$row['TENTRUYEN'].'</a></h3>
                                </div>
                                <div class="lastchap">
                                    <span>
                                        Last Chapter 
                                        <a href="../Chapter.php?id='.$row['IDTRUYEN'].'&name='.to_slug($row['TENTRUYEN']).'&chap='.$row['LastChapter'].'">'.$row['LastChapter'].'</a>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="post-on">'.$row['LastUpdate'].'</div>
                    </td>
                    <td>
                        <div class="action">
                            <a onclick="ConFirmXoa('.$row['IDTAIKHOAN'].','.$row['IDTRUYEN'].')"><i class="fa fa-window-close"></i></a>
                        </div>
                    </td>
                </tr>
            ';
        }
    }

?>
<?php 

    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../template/link.php'; ?>
</head>
<body>
    <div class="container-scroller">
        <?php include '../template/header.php'; ?>

        <div class="main-panel">
          <div class="content-wrapper">
            <!-- <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
                  <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
                  <i class="mdi mdi-close" id="bannerClose"></i>
                </span>
              </div>
            </div> -->
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white mr-2">
                        <i class="mdi mdi-home"></i>
                        </span> Thêm chương
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thêm chương</h4>
                                <p class="card-description"> Basic form elements </p>
                                
                                <form class="forms-sample" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Tên truyện</label>
                                        <?php 
                                            // if($_REQUEST['id']==TRUE){
                                            //     $result_ten_truyen= mysqli_query($conn,"SELECT * FROM truyen WHERE IDTRUYEN = ".$_GET['id']);
                                            //     $ten_truyen= mysqli_fetch_assoc($result_ten_truyen);
                                            //     $title= $ten_truyen['TENTRUYEN'];
                                            //         echo '                                                        
                                            //             <input type="text" name="tentruyen" value="'.$title.'" class="form-control" id="exampleInputChap" placeholder="Tên truyen">
                                                       
                                            //         ';
                                            // }
                                            // else {

                                        ?>
                                            <select class="form-control" id="exampleSelectGender" name="tentruyen">
                                                <?php 
                                                    include '../template/connect.php';
                                                    $sql = "SELECT * FROM truyen";
                                                    $query = $conn->query($sql);
                                                    if($query){
                                                        while ($row = $query->fetch_assoc()) {
                                                            echo '<option value="'.$row['IDTRUYEN'].'">'.$row['TENTRUYEN'].'</option>';
                                                        }
                                                    }
                                                
                                                ?>
                                            </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Chương</label>
                                        <input type="text" name="chuong" class="form-control" id="exampleInputChap" placeholder="Chương số" name="inputChap">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Tên chương(nếu có)</label>
                                        <input type="text" name="tenchuong" class="form-control" id="exampleInputNameChap" placeholder="Tên chương">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Tình trạng truyện</label>
                                        <select class="form-control" id="exampleSelectGender" name="inputTinhtrang">
                                            <option> Hoàn thành</option>
                                            <option>Đang tiến hành</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>File upload</label>
                                        <br>
                                        <input type="file" name="fileupload[]" multiple="multiple">
                                        <div class="input-group col-xs-12">
                                        
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-gradient-primary mr-2" name="themchuong">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <?php include '../template/footer.php'; ?>
    </div>
    
</body>
</html>
<?php
    include '../Models/Slug.php';
    if(isset($_REQUEST['themchuong'])){

        $idtruyen=$_REQUEST['tentruyen'];
        $tinhtrangtruyen= $_REQUEST['inputTinhtrang'];
        // so sanh voi chuong nhap vao

        $sql_chap=mysqli_query($conn,"SELECT MAX(`IDCHAPTER`) AS MAXCHAP FROM chap WHERE IDTRUYEN= $idtruyen");
        $rs_chap= mysqli_fetch_assoc($sql_chap);
        $idchap= $rs_chap['MAXCHAP'];

        $sql_anh=mysqli_query($conn,"SELECT MAX(`IDANH`) AS MAX FROM upload");
        $rs_anh= mysqli_fetch_assoc($sql_anh);
        $idanh= $rs_anh['MAX'];
        $idanh+=1;

       
        $chuong=$_REQUEST['chuong'];
        $tenchuong=$_REQUEST['tenchuong'];
        $view=0;
        $idchapter="$idtruyen$chuong";

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $lastupdate = date('Y/m/d H:i');

        $tittle;
        $img;
        
// Thêm chương
            $sql_themchuong="INSERT INTO chap VALUES('$idtruyen','$chuong','$view','$idchapter','$tenchuong','$lastupdate')";
            $rs= $conn->query($sql_themchuong);
            $sql_lastchap_truyen="UPDATE truyen SET LastChapter= '$chuong',TINHTRANG='$tinhtrangtruyen', LastUpdate='$lastupdate' WHERE IDTRUYEN=$idtruyen";
            $rs_lastchapter_truyen=$conn->query($sql_lastchap_truyen);
// THêm thông báo

            $sql_tentruyen=mysqli_query($conn,"SELECT TENTRUYEN FROM truyen WHERE IDTRUYEN=$idtruyen");
            $rs_tentruyen=mysqli_fetch_assoc($sql_tentruyen);
            $name=$rs_tentruyen['TENTRUYEN'];

            $sql_max_id_thongbao=mysqli_query($conn,"SELECT MAX(`IDTHONGBAO`) AS MAX FROM thongbao");
            $max_id= mysqli_fetch_assoc($sql_max_id_thongbao);
            $idtb= $max_id['MAX'];
            $idtb+=1;
            $tinhtrang="Chưa đọc";
            $loaitt="Thêm chương";

            $tentk= $_SESSION['username'];
            $noidung="$tentk đã thêm chuong $chuong của truyện $name vào lúc $lastupdate";

            $sql_thongbao="INSERT INTO thongbao VALUES('$idtb','$tinhtrang','$noidung','$tentk','$loaitt')";
            $rs_thongbao=$conn->query($sql_thongbao);

            if($rs){
                

                $chap=  'chap-'.$chuong;
                $tentruyen=to_slug($name);
            
                $luu= '../../upload/'.$tentruyen.'/'.$chap;
                $linkchuong= $tentruyen.'/'.$chap;
            
                if(!mkdir($luu,0700,true)){
                    die ('Faile');
                }
            
                $fileCount=count($_FILES['fileupload']['name']);
                echo $fileCount;

                    $numfiles = 0;
                    for ($i = 0; $i < $fileCount; $i ++) {
                        //Kiểm tra file thứ $i trong mảng file, up thành công không
                    
                            move_uploaded_file($_FILES['fileupload']['tmp_name'][$i],$luu.'/'.$_FILES['fileupload']['name'][$i]);


                            $file_ext = pathinfo( $luu.'/'.$_FILES['fileupload']['name'][$i] , PATHINFO_EXTENSION);
                            echo $file_ext;
                            
                            $rename=$tentruyen.'-'.$chap.'-anh-'.$numfiles.'.'.$file_ext;
                            echo $_FILES['fileupload']['name'][$i];

                            rename($luu.'/'.$_FILES['fileupload']['name'][$i], $luu.'/'.$rename); 

                            $sql_upload_anh="INSERT INTO upload VALUES('$idanh','$idtruyen','$chuong','$tenchuong','$rename','$rename','$linkchuong')";
                            if($conn->query($sql_upload_anh)== TRUE){
                                echo 'thanh cong!';
                                $idanh+=1;
                            }
                            else {
                                echo 'that bai!';
                            }

                            $numfiles++;
                        
                    }
                    echo "Tổng số file upload: " .$numfiles;
                }
        

    }
    
?>

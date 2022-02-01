<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../template/link.php'; ?>
    <link rel="stylesheet" href="../assets/css/style-theloai.css">
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
                        </span> Thêm truyện
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
                                <h4 class="card-title">Basic form elements</h4>
                                <p class="card-description"> Basic form elements </p>
                                <form class="forms-sample" method="POST"  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="exampleSelectName">Tên truyện</label>
                                    <input type="text" name="tentruyen" class="form-control" id="exampleInputTruyen" placeholder="Tên truyện">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectName">Tên khác</label>
                                    <input type="text" name="tenkhac" class="form-control" id="exampleInputTen" placeholder="Tên khác">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleSelectName">Tác giả</label>
                                    <input type="text" name="tacgia" class="form-control" id="exampleInputTentg" placeholder="Tên tác giả">
                                </div>

                                <div class="container-st">
                                    <label for="exampleSelectGenes">Thể loại</label>
                                    <select multiple data-multi-select-plugin name="theloai">
                                        <?php 
                                         include '../template/connect.php';
                                         $sql = "SELECT * FROM thongtintheloai";
                                         $query = $conn->query($sql);
                                         if($query){
                                             while ($row = $query->fetch_assoc()) {
                                                 echo '<option value="'.$row['THELOAITRUYEN'].'">'.$row['THELOAITRUYEN'].'</option>';
                                             }
                                         }
                                                                    
                                     ?>
                                    </select>
                                </div>  

                                <div class="form-group">
                                    <label for="exampleInputCity1">Giới thiệu(nếu có)</label>
                                    <textarea type="text" name="gioithieu" class="form-control" id="exampleInputGioi" placeholder="Giới thiệu" rows="4"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>File upload</label>
                                    <br>
                                    <input type="file" name="fileupload">
                                    <div class="input-group col-xs-12">
                                    
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-gradient-primary mr-2" name="themtruyen">Submit</button>
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
    if(isset($_REQUEST['themtruyen'])){
        $theloaitruyen= $_REQUEST['theloai'];
        $tentruyen= $_REQUEST['tentruyen'];
        $slugtruyen= to_slug($tentruyen);

        $gioithieu=$_REQUEST['gioithieu'];
       
        if(getimagesize($_FILES['fileupload']['tmp_name'])==FALSE){
            echo 'Vui long chon anh!';
        }
        else {
            
        $image2 = $_FILES['fileupload']['tmp_name'];
        $image = base64_encode(file_get_contents(addslashes($image2)));
        

        $sql_max_truyen=mysqli_query($conn,"SELECT MAX(`IDTRUYEN`) AS MAX FROM truyen");
        $max_truyen= mysqli_fetch_assoc($sql_max_truyen);
        $idtruyen= $max_truyen['MAX'];
        $idtruyen+=1;

        $lastchapter=0;

        $tacgia= $_REQUEST['tacgia'];
        if($tacgia==''){
            $tacgia="Đang cập nhật";
        }

        $tenkhac=$_REQUEST['tenkhac'];
        if($tenkhac==''){
            $tenkhac="Đang cập nhật";
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $lastupdate = date('Y/m/d H:i');
          
          // echo "$image";
         $view=0;
         $so_chapter=0;
         $luottheodoi=0;
         $tinhtrang='Đang tiến hành';
         
         $dir="../../upload/$slugtruyen";
                    echo $dir_new;

          $sql = "INSERT INTO truyen VALUES('$idtruyen','$tentruyen','$theloaitruyen','$gioithieu','$so_chapter','$image','$view','$luotheodoi','$tacgia','$tinhtrang','$tenkhac','$lastchapter','$lastupdate')";
          
          $query = $conn->query($sql);
          
          if($query){    
            if(!file_exists($dir)){
                // Tạo một thư mục mới
                if(mkdir($dir)){
                    echo "Tạo thư mục thành công.";
                } else{
                    $dir_new= "../../upload/$slugtruyen-1";
                    mkdir($dir_new);
                }
            } else{
                echo "ERROR: Thư mục đã tồn tại.";
            } 

            echo "<script type='text/javascript'> window.location.href='admin.addchuong.php';</script>";
          }     
          else{
              echo "<script type='text/javascript'>alert('Tạo không thành công'); window.location.href='admin.addchuong.php';</script>";
          }
      }
        
    }


?>
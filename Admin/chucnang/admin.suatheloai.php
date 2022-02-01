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
                        </span> Thêm thể loại
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
                                <form class="forms-sample" method="post">

                                <?php 
                                            include '../template/connect.php';
                                            $sql = "SELECT * FROM thongtintheloai";
                                            $query = $conn->query($sql);
                                            $value=1;
                                            echo '<div class="form-group">
                                            <label for="exampleSelectGender">Tên thể loại</label>
                                            <select class="form-control" name="theloai" id="exampleSelectGender">';
                                            if($query){
                                                while ($row = $query->fetch_assoc()) {
                                                    echo '<option name="theloai" value="'.$row['THELOAITRUYEN'].'">'.$row['THELOAITRUYEN'].'</option>';
                                                    $value+=1;
                                                }
                                            }
                                            echo ' </select> </div>';
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung thể loại</label>
                                    <input type="text" name="noidung" class="form-control" id="exampleInputChap" placeholder="Noi dung sua">
                                    
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputName1">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="exampleInputChap" placeholder="Slug">
                                    
                                </div> -->

                                
                                <button type="submit" class="btn btn-gradient-primary mr-2" name="suatheloai" value="Gửi">Hoàn thành</button>
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
    if(isset($_REQUEST['suatheloai'])){
        $tentheloai=$_REQUEST['theloai'];
        $noidung=$_REQUEST['noidung'];
        // $Slug= $_REQUEST['slug'];
        $sql="UPDATE thongtintheloai SET NOIDUNGTHELOAI='$noidung' WHERE THELOAITRUYEN='$tentheloai'";
        $query= $conn ->query($sql);
        
        if($query){
            echo "<script type='text/javascript'>alert('Sua thành công'); window.location.href='admin.suatheloai.php';</script>";
          }     
          else{
              echo "<script type='text/javascript'>alert('Sua không thành công'); window.location.href='admin.suatheloai.php';</script>";
          }
    }


?>
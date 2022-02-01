    <?php
        session_start();
        include '../Models/Slug.php';
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

                                <div class="form-group">
                                    <label for="exampleSelectGender">Tên thể loại</label>
                                    <input type="text" name="tentheloai" class="form-control" id="exampleInputGenes" placeholder="Tên thể loại">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung thể loại</label>
                                    <input type="text" name="noidungtheloai" class="form-control" id="exampleInputChap" placeholder="Chương số">
                                    
                                </div>

                                
                                <button type="submit" class="btn btn-gradient-primary mr-2" name="themtheloai" value="Gửi">Them</button>
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
    if(isset($_REQUEST['themtheloai'])){
        $tentheloai=$_REQUEST['tentheloai'];
        $noidung=$_REQUEST['noidungtheloai'];
        $Slug= to_slug($tentheloai);

        $sql="INSERT INTO thongtintheloai(THELOAITRUYEN,NOIDUNGTHELOAI,Slug) VALUES('$tentheloai','$noidung','$Slug')";
        $query= $conn ->query($sql);
        
        if($query){
            echo "<script type='text/javascript'>alert('Them thành công'); window.location.href='admin.addtheloai.php';</script>";
          }     
          else{
              echo "<script type='text/javascript'>alert('Da ton tai!'); window.location.href='admin.addtheloai.php';</script>";
          }
    }


?>
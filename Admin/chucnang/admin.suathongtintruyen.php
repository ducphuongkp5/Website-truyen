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
        <?php 
            include '../template/header.php'; 
            include '../template/connect.php'; 
            $sql= mysqli_query($conn, "SELECT * FROM truyen WHERE IDTRUYEN=".$_GET['truyen']);
            $rs= mysqli_fetch_assoc($sql);
            
        ?>

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
                        </span> Sửa thông tin truyện
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
                                        <label for="exampleInputName1">Tên truyện</label>
                                        <input type="text" name="tentruyen" class="form-control" id="exampleInputChap" placeholder="Chương số" name="inputChap" value="<?= $rs['TENTRUYEN']?>">
                                                                           
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Ảnh đại diện</label>
                                        <img src="data:image/jpeg;charset=utf8;base64, <?= $rs['ANHDAIDIENTRUYEN']?>" alt="" style="height:180px">
                                    </div>

                                    
                                    <div class="form-group">
                                        <label>Đổi ảnh đại diện</label>
                                        <br>
                                        <input type="file" name="fileupload[]" multiple="multiple">
                                        <div class="input-group col-xs-12">
                                        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Thể loại</label>
                                        <input type="text" name="chuong" class="form-control" value="<?=$rs['THELOAITRUYEN']?>" id="exampleInputChap" placeholder="Chương số" name="inputChap">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Tên khác</label>
                                        <input type="text" name="tenkhac" value="<?= $rs['TENKHAC']?>" class="form-control" id="exampleInputNameChap" placeholder="Tên chương">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Tác giả</label>
                                        <input type="text" name="tenkhac" value="<?= $rs['TACGIA']?>" class="form-control" id="exampleInputNameChap" placeholder="Tên chương">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputCity1">Nội dung</label>
                                        <textarea name="" id="" class="form-control" cols="30" rows="10"><?= $rs['GIOITHIEU']?></textarea>
                                        <!-- <input type="text" rows="4" name="noidung" value="<?= $rs['GIOITHIEU']?>" class="form-control" id="exampleInputNameChap" placeholder="Tên chương"> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Tình trạng truyện</label>
                                        <select class="form-control" id="exampleSelectGender" name="inputTinhtrang">
                                            <option> Hoàn thành</option>
                                            <option>Đang tiến hành</option>
                                        </select>
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
    if(isset($_REQUEST['thaydoiquyen'])){
        $TENTAIKHOAN = $_REQUEST['TENTAIKHOAN'];
        $quyentaikhoan = $_REQUEST['quyentaikhoan'];
        $sql = "UPDATE thongtintaikhoan SET QUYENTAIKHOAN='$quyentaikhoan' WHERE `TENTAIKHOAN`='$TENTAIKHOAN'";
        $query = $conn->query($sql);
        if($query){
            echo "<script type='text/javascript'>alert('Đã thay đổi!');window.location.href='../chucnang/admin.quanlitaikhoan.php';</script>";
        }
    }
    if(isset($_REQUEST['huythaydoi'])){
        echo "<script type='text/javascript'>window.location.href='../chucnang/admin.quanlitaikhoan.php';</script>";
    }
?>
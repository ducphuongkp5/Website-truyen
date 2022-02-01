
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
                        </span> Thông tin tài khoản!
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

                                    $Tentk=$_SESSION['username'];
                                    $sql="SELECT * FROM thongtintaikhoan WHERE TENTAIKHOAN='$Tentk'";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()){
                                        echo '
                                            <div class="form-group">
                                                <label for="exampleSelectGender">Tên tài khoản</label>
                                                <input type="text" name="name" value="'.$row['TENTAIKHOAN'].'" class="form-control" id="exampleInputGenes" placeholder="Tên tai khoan">
                                            </div>
                                        ';
                                        echo '
                                            <div class="form-group">
                                                <label for="exampleInputName1">Email</label>
                                                <input type="text" name="email" value="'.$row['GMAIL'].'" class="form-control" id="exampleInputChap" placeholder="Email">                                                
                                            </div>
                                        ';
                                        echo '
                                            <div class="form-group">
                                            <label for="exampleInputPass1">Mật khẩu mới</label>
                                            <input type="text" name="pass"  class="form-control" id="exampleInputPass" placeholder="Mật khẩu mới">                                            
                                            </div>

                                        ';
                                        echo '
                                            <div class="form-group">
                                                <label>Ảnh đại diện</label>
                                                <image src="data:image/jpeg;charset=utf8;base64,'.$row['AVATAR'].'" style="width=:120px;height:120px"></image>
                                                <br>
                                                <h5>Doi anh</h5>
                                                <input type="file" name="fileupload[]">
                                                <div class="input-group col-xs-12">
                                                    
                                                </div>
                                            </div>
                                            ';
                                    }
                                
                                ?>
                                                                
                                <button type="submit" class="btn btn-gradient-primary mr-2" name="suathongtin" value="Gửi">Lưu</button>
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
    
    if(isset($_REQUEST['suathongtin'])){
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            
            $sql = "UPDATE thongtintaikhoan SET TENTAIKHOAN='$name', GMAIL='$email' WHERE TENTAIKHOAN='$Tentk'";
            $query = $conn->query($sql);
            if($query){
                echo "<script type='text/javascript'>alert('Đã thay đổi thông tin tài khoản');window.location.href='admin.thongtin.php';</script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Email hoặc Số điện thoại đã được sử dụng!');window.location.href='admin.thongtin.php';</script>";
            }
    }
?>
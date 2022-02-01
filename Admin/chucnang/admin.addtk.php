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
                        </span> Thêm tài khoản
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

                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Tên tài khoản</label>
                        <input type="text" name="tentaikhoan" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Họ</label>
                        <input type="text" name="ho" class="form-control" id="exampleInputHo" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Tên</label>
                        <input type="text" name="ten" class="form-control" id="exampleInputTen" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Giới tính</label>
                        <select class="form-control" name="gioitinh" id="exampleSelectGender">
                          <option>Nam</option>
                          <option>Nữ</option>
                        </select>
                      </div>
                      <div class="form-group">
                          <label>File upload</label>
                          <br>
                         <input type="file" name="fileupload">
                          
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Câu trả lời lấy pass</label>
                        <input type="text" name="reppass" class="form-control" id="exampleInputRep"  rows="4" placeholder="Trả lời">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Quyền tài khoản</label>
                        <select class="form-control" name="quyentk" id="exampleSelectGender" style="width:200px">
                            <?php 
                                include '../template/connect.php';
                                $sql = "SELECT * FROM quyentaikhoan";
                                 $query = $conn->query($sql);
                                 $value=1;
                                    if($query){
                                        while ($row = $query->fetch_assoc()) {
                                            echo '<option value="'.$value.'">'.$row['IDQUYEN'].' '.$row['QUYENTAIKHOAN'].'</option>';
                                        }
                                    }                                        
                            ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2" name="themtaikhoan">Submit</button>
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

  include '../template/connect.php';

  
  $rsss=mysqli_query($conn,"SELECT MAX(`IDTAIKHOAN`) AS MAX FROM thongtintaikhoan");
  $truyensdf= mysqli_fetch_assoc($rsss);
  $idtk= $truyensdf['MAX'];
  echo $idtk;
  $idtk+=1;
    
  if(isset($_REQUEST['themtaikhoan'])){

      if(getimagesize($_FILES['fileupload']['tmp_name'])==false){
          echo "Vui lòng chọn ảnh";
      }else{


        $image2 = $_FILES['fileupload']['tmp_name'];
        $image = base64_encode(file_get_contents(addslashes($image2)));
        
          // echo "$image";
         $tentk= $_REQUEST['tentaikhoan'];
         $ho=$_REQUEST['ho'];
         $ten=$_REQUEST['ten'];
         $gmail=$_REQUEST['email'];

         $password= to_slug($_REQUEST['pass']);
         $pass= md5($password);
         $gioitinh= $_REQUEST['gioitinh'];
         $rep=$_REQUEST['reppass'];
         $quyen=$_REQUEST['quyentk'];

        //  if(!empty($_FILES['fileupload']['tmp_name']) && file_exists($_FILES['fileupload']['tmp_name'])) {
        //       $image= addslashes(file_get_contents($_FILES['fileupload']['tmp_name']));
        //       echo 'vao';
              
              
        //   }
        //   else {
        //     echo"chua vao";
        //   }
          echo $image;
          $sql = "INSERT INTO thongtintaikhoan VALUES('$idtk','$gmail','$ten','$ho','$gioitinh','$image','$quyen','$tentk','$pass','$rep')";
          
          $query = $conn->query($sql);
          
          if($query){
            echo "<script type='text/javascript'>alert('thành công'); window.location.href='admin.quanlitaikhoan.php';</script>";
          }     
          else{
              echo "<script type='text/javascript'>alert('Thêm không thành công'); window.location.href='admin.addtk.php';</script>";
          }
      }
    }

?>
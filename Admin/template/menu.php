<?php 
    
    include '../template/connect.php';
    $check=$_SESSION['username']??"";
    
    $result_anh= mysqli_query($conn,"SELECT `AVATAR`, `IDTAIKHOAN` FROM `thongtintaikhoan` WHERE `TENTAIKHOAN`= '$check'");
        
    $anh= mysqli_fetch_assoc($result_anh);

    $src="data:image/jpeg;charset=utf8;base64,".$anh['AVATAR'];
?>
 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="http://localhost:8080/WebFun/truyen/Admin/pages/index.php"><img src="../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="http://localhost:8080/WebFun/truyen/Admin/pages/index.php"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li> -->
            <!-- =================================Thong bao=========================== -->
            <?php 
                  $sql_thongbao=mysqli_query($conn,"SELECT * FROM `thongbao` WHERE `LOAI`='Thêm chương' ORDER BY `IDTHONGBAO` DESC LIMIT 1");                  
                  $sql_thongbao_dk=mysqli_query($conn,"SELECT * FROM `thongbao` WHERE `LOAI`='Đăng ký' ORDER BY `IDTHONGBAO` DESC LIMIT 1");
                
                
                ?>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown" style="width:290px">
                <h6 class="p-3 mb-0">Thông báo</h6>
                
                  <?php 
                    while($row_tb=mysqli_fetch_assoc($sql_thongbao)){
                      echo '
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                              <i class="mdi mdi-calendar"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">'.$row_tb['LOAI'].'</h6>
                            <p class="text-gray ellipsis mb-0">'.$row_tb['NOIDUNG'].'</p>
                          </div>
                          </a>
                          
                      ';
                    }
                  
                  ?>
                <div class="dropdown-divider"></div>
                    <?php 
                        if($sql_thongbao_dk->num_rows >0){
                          while($row_tb_dk=mysqli_fetch_assoc($sql_thongbao_dk)){
                            echo '
                                  <a class="dropdown-item preview-item">
                                  <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                      <i class="mdi mdi-link-variant"></i>
                                    </div>
                                  </div>
                                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">'.$row_tb_dk['LOAI'].'</h6>
                                    <p class="text-gray ellipsis mb-0">'.$row_tb_dk['NOIDUNG'].'</p>
                                  </div>
                                </a>
                
                                <div class="dropdown-divider"></div>
                                
                              </div>
                            ';
                          }
                        }
                    ?>
                <!-- <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a> -->
                <div class="dropdown-divider"></div>

                <h6 class="p-3 mb-0 text-center" href="#">Xem tất cả thông báo</h6>

            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <!-- =========================Acccout================= -->
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?=$src?>" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?= $_SESSION['username']?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="../chucnang/admin.thongtin.php">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Thông tin tài khoản </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../pages/logout.php">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Đăng xuất </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
</nav>
<div class="container-fluid page-body-wrapper">
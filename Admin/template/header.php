<?php 
    // session_start();
    // if (!isset($_SESSION['admin'])) {
    //     header('Location: ./pages/login.php');
    // }
?>
<?php include 'menu.php';?>

        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8080/WebFun/truyen/Admin/pages/index.php">
                <span class="menu-title">Trang chủ</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Chức năng</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li> -->
                  <li class="nav-item"> <a class="nav-link" href="../chucnang/admin.addchuong.php">Thêm chương</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../chucnang/admin.addtheloai.php">Thêm thể loại</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../chucnang/admin.suatheloai.php">Sửa thể loại</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../chucnang/admin.xoatheloai.php">Xóa thể loại</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../chucnang/admin.addtk.php">Thêm tài khoản</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../chucnang/admin.quanlitaikhoan.php">Quản lí tài khoản</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../chucnang/admin.thongtin.php">Tài khoản của bạn</a></li>
                </ul>
              </div>
            </li>
            
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div>
                <a class="btn btn-block btn-lg btn-gradient-primary mt-4" href="../chucnang/admin.themtruyen.php">+ Thêm truyện</a>
                <div class="mt-4">
                  <div class="border-bottom">
                    <p class="text-secondary">Categories</p>
                  </div>
                  <!-- <ul class="gradient-bullet-list mt-4">
                    <li>Free</li>
                    <li>Pro</li>
                  </ul> -->
                </div>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        
        <!-- main-panel ends -->

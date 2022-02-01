<?php 
    session_start();
    include './connect.php';
    $check=$_SESSION['username']??"";
    $checkquyen=$_SESSION['quyen']??"";
    $href =  "";
    $href1 =  "";
    $value = "";
    $namebt = "";
    $valueTenTK = "";
    echo $check;
    if($check){
        $href = "../Logout.php";
        $value = "Đăng xuất";
        $valueTenTK = $_SESSION['username'];
        if($checkquyen==1){
            $href1="Admin/index.php";
        }
        else{
            $href1="AUser/index.php";
        }
        $result_anh= mysqli_query($conn,"SELECT AVATAR,IDTAIKHOAN FROM thongtintaikhoan WHERE TENTAIKHOAN = '$check'");
        
        $anh= mysqli_fetch_assoc($result_anh);
        $id= $anh['IDTAIKHOAN'];
        
        $src="data:image/jpeg;charset=utf8;base64,". $anh['AVATAR'];
        
    }else{
        $value = "Đăng nhập";
        $href = "Login.php";
        $href1 =  "../Login.php";
        $valueTenTK = "Tài khoản của tôi";
        $src="../images/icon/default.png";
    }
    
?>

  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
        <div class="icon"> <a href="../index.php" style="text-decoration: none; color: white">Kohi<b style="color: aqua">Loli</b></a></div>
            <ul class="links" style="list-style: none;">              
              <li>
                <a href="#"class="desktop-link">Thể loại</a>
                <input type="checkbox" id="show-features">
                <label for="show-features">Thể loại</label>
                <ul>
                  <?php 
                   $sql = "SELECT * FROM thongtintheloai";
                   $query = $conn->query($sql);
                   if($query){
                       while ($row = $query->fetch_assoc()) {
                           echo '<li class="genes"><a href="../theloai.php?theloai='.$row['THELOAITRUYEN'].'">'.$row['THELOAITRUYEN'].'</a></li>';
                       }
                   }
                                              
                ?>
                </ul>
              </li>
              <li><a href="./../TruyenFull.php">Truyện Full</a></li>
              <li><a href="index.php">Theo dõi</a></li>
            <li class="dis"><a href="<?=$href?>"><?= $value?></a></li>
            </ul>
        </div>
        
        <ul>
            <li class="dropdown">
                <a id="UserDropdown" href="#" class="Profile">
                    <img src="<?= $src?>" alt="Profille">
                </a>
                <div class="dropdown-Profile" aria-labelledby="UserDropdown">

                    <div class="content-Profile" style="text-align: center !important;margin-top:7px">
                        <a href="#"><img src="<?= $src?>" alt="Profile image"></a>
                    </div>

                    <div class="content-Profile" style="text-align: center !important;margin-top:7px">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <div class="slider round"></div>
                            </label>
                        </div>
                        <a class="dropdown-item" href= "<?= $href1 ?>">
                            <i class="fa fa-user" style="color:blue; text-align: left;margin-bottom:7px"></i> 
                            Thông tin cá nhân 
                        </a>    
                        <br>       
                        <a class="dropdown-item" href="<?= $href?>">
                            <i class="fa fa-sign-out" style="color:blue; text-align: left"></i>
                            <?=$value ?>
                        </a>
                    </div>
                </div>
            </li>
        </ul>

      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" name="search" placeholder="Type Something to Search..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
     
  </div>
<section></section>
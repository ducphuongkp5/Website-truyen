
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Cài đặt</title>
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <!-- Site Icons -->
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- Site CSS -->

    <link rel="stylesheet" href="../css/style-men.css">
    <link rel="stylesheet" href="../css/reponsive.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <script defer src="/your-path-to-fontawesome/js/all.js"></script>
    <script src="http://kit.fontawesome.com/67c66657c7.js"></script>

    <!-- Responsive CSS -->
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap-social.css"> -->
    <link rel="stylesheet" href="style-user.css">
    
</head>
<body>
        
    <?php 
        include 'connect.php';
        include 'pages/header.php';
        
        $sql_tk=mysqli_query($conn,"SELECT * FROM thongtintaikhoan WHERE IDTAIKHOAN=$id");
        
        $rs= mysqli_fetch_assoc($sql_tk);
        
        
    ?>
    
    
    <div class="menu-ver-container">
        
        <div class="left">
            <div class="wrap-tab">
                <ul class="nav">
                    <li><a href="index.php">Đang theo dõi</a></li>
                    <li><a href="Caidat.php">Cài đặt</a></li>
                </ul>
            </div>
        </div>
        <div class="right" style="margin-left:30px;">
            <div class="content-wrap" style="margin-left:30px">
                <div class="tab-panel">

                    <form method="POST" >
                        <div class="tab-item">
                            <div class="set-title">
                            <div class="name-entry"><h4>Tên tài khoản</h4>
                            <span><?= $rs['TENTAIKHOAN']?></soan>
                            </div>
                                
                            </div>
                            
                        </div>
                        <div class="tab-item">
                            <div class="set-title">
                            <div class="name-entry">
                                <h4>Tên tài khoản mới</h4>
                                <input type="text" style="height:40px" id="tentaikhoan" name="tentaikhoan" value="<?= $rs['TENTAIKHOAN']?>">
                            </div>
                                
                            </div>
                            
                        </div>
                        <div class="tab-item">
                            <div class="set-title">
                            <div class="name-entry"><h4>Địa chỉ email</h4>
                            <span><?= $rs['GMAIL']?></span>
                            </div>
                                
                            </div>
                            
                        </div>
                        <div class="tab-item">
                            <div class="set-title">
                            <div class="name-entry">
                                <h4>New email</h4>
                                <input type="text" style="height:40px" name="email" value="<?= $rs['GMAIL']?>">
                            </div>                                
                            </div>                            
                        </div>

                        <div class="tab-item">
                            <div class="set-title">
                            <div class="name-entry"><h4>Mật khẩu</h4>
                            <input style="height:40px" name="oldpass" type="password" value="<?=$rs['PASS']?>">
                            </div>
                                
                            </div>
                            
                        </div>
                        <div class="tab-item">
                            <div class="set-title">
                            <div class="name-entry">
                                <h4>Password mới</h4>
                                <input type="text" name="newpass" style="height:40px" name="email">
                            </div>                                
                            </div>                            
                        </div>
                        <div class="tab-item">
                            <div class="set-title">
                            <div class="name-entry">
                                <h4>Nhập lại password</h4>
                                <input type="text" name="confirm_pass" style="height:40px" name="email">
                            </div>                                
                            </div>                            
                        </div>
                        <div class="tab-item" style=" text-align: center; vertical-align: middle;">
                                <div class="name-entry">
                                    <button name="thaydoithongtin">Submit</button>
                                </div>                                
                                                      
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>
<?php 
    if(isset($_REQUEST['thaydoithongtin'])){

        $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        if(!preg_match($partten ,$subject, $matchs))
        echo  "Mail bạn vừa nhập không đúng định dạng ";

        $tentk=$_REQUEST['tentaikhoan'];
        $email=$_REQUEST['email'];
        $newpass=$_REQUEST['newpass'];
        $confirm=$_REQUEST['confirm_pass'];
        if($tentk==''){
            echo "<script type='text/javascript'>alert('Tên tài khoản trống'); </script>";

        }
        if(!preg_match($partten ,$email, $matchs)){
            echo "<script type='text/javascript'>alert('Mail không đúng định dạng'); </script>";

        }
        if($newpass  != $confirm){
            echo "<script type='text/javascript'>alert('Mật khẩu không trùng nhau đúng định dạng'); </script>";
        }
        else if($pass='' && $confirm=''){
            $pass=$_POST['oldpass'];
        }
        else{                
            $pass=md5($confirm);
        }


        $sql="UPDATE thongtintaikhoan SET TENTAIKHOAN=$tentk, GMAIL=$email, PASS=$pass WHERE IDTAIKHOAN=$id";
        echo $sql;
        $query= $conn->query($sql);
        
        if($query){
            echo "<script type='text/javascript'>alert('Thay đổi thành công'); window.location.href='Caidat.php';</script>";
          }     
          else{
              echo "<script type='text/javascript'>alert('Thất bại!'); window.location.href='Caidat.php';</script>";
          }
    
    }
    else{
        echo "chua vao";
    }

?>


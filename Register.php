<?php 
  session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Sign In </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Robito',sans-serif;
        }
        body{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }
        .container{
        max-width: 700px;
        width: 100%;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.15);
        }
        .container .title{
        font-size: 25px;
        font-weight: 500;
        position: relative;
        }
        .container .title::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        border-radius: 5px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }
        .content form .user-details{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
        }
        form .user-details .input-box{
        margin-bottom: 15px;
        width: calc(100% / 2 - 20px);
        }
        form .input-box span.details{
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
        }
        .user-details .input-box input{
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
        }
        .user-details .input-box input:focus,
        .user-details .input-box input:valid{
        border-color: #9b59b6;
        }
        form .gender-details .gender-title{
        font-size: 20px;
        font-weight: 500;
        }
        form .category{
        display: flex;
        width: 80%;
        margin: 14px 0 ;
        justify-content: space-between;
        }
        form .category label{
        display: flex;
        align-items: center;
        cursor: pointer;
        }
        form .category label .dot{
        height: 18px;
        width: 18px;
        border-radius: 50%;
        margin-right: 10px;
        background: #d9d9d9;
        border: 5px solid transparent;
        transition: all 0.3s ease;
        }
        #dot-1:checked ~ .category label .one,
        #dot-2:checked ~ .category label .two,
        #dot-3:checked ~ .category label .three{
        background: #9b59b6;
        border-color: #d9d9d9;
        }
        form input[type="radio"]{
        display: none;
        }
        form .button{
        height: 45px;
        margin: 35px 0
        }
        form .button input{
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }
        form .button input:hover{
        /* transform: scale(0.99); */
        background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }
        @media(max-width: 584px){
        .container{
        max-width: 100%;
        }
        form .user-details .input-box{
            margin-bottom: 15px;
            width: 100%;
        }
        form .category{
            width: 100%;
        }
        .content form .user-details{
            max-height: 300px;
            overflow-y: scroll;
        }
        .user-details::-webkit-scrollbar{
            width: 5px;
        }
        }
        @media(max-width: 459px){
        .container .content .category{
            flex-direction: column;
        }
        }}

   </style>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Tên tài khoản</span>
            <input type="text" name="tentk" placeholder="Tên tài khoản" required>
          </div>
          <div class="input-box">
            <span class="details">Gmail</span>
            <input type="text" name="Gmail" placeholder="Gmail" required>
          </div>
          <div class="input-box">
            <span class="details">Họ</span>
            <input type="text" name="ho" placeholder="Họ" required>
          </div>
          <div class="input-box">
            <span class="details">Tên</span>
            <input type="text" name="ten" placeholder="Tên" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pass" placeholder="Password" required>
          </div>
          <div class="input-box">
            <span class="details">Câu trả lời lấy lại tài khoản</span>
            <input type="text" name="reppass" placeholder="Câu trả lời lấy lại tài khoản" required>
          </div>
        </div>

        <div class="form-group">
                        <label for="exampleSelectGender">Giới tính</label>
                        <select class="form-control" name="gioitinh" id="exampleSelectGender">
                          <option>Nam</option>
                          <option>Nữ</option>
                        </select>
        </div>
        <br>

        <div class="input-box" >
            <span class="details">Ảnh đại diện</span>
            <input type="file" name="Anh" accept="image/*" required>
            
          </div>
        <div class="button">
          <input type="submit" name="Register" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
<?php

  include 'template/connect.php';
  include 'Model/Slug.php';

  
  $rsss=mysqli_query($conn,"SELECT MAX(`IDTAIKHOAN`) AS MAX FROM thongtintaikhoan");
  $truyensdf= mysqli_fetch_assoc($rsss);
  $idtk= $truyensdf['MAX'];
  $idtk+=1;
    
  if(isset($_REQUEST['Register'])){

      if(getimagesize($_FILES['Anh']['tmp_name'])==false){
          echo "Vui lòng chọn ảnh";
      }else{


        $image2 = $_FILES['Anh']['tmp_name'];
        $image = base64_encode(file_get_contents(addslashes($image2)));
        
          // echo "$image";
         $tentk= $_REQUEST['tentk'];
         $ho=$_REQUEST['ho'];
         $ten=$_REQUEST['ten'];
         $gmail=$_REQUEST['Gmail'];
        $gioitinh=$_REQUEST['gioitinh'];

         $password= to_slug($_REQUEST['pass']);
         $pass= md5($password);

         $rep=$_REQUEST['reppass'];
         $quyen=2;

          echo $gioitinh;
          $sql = "INSERT INTO thongtintaikhoan VALUES('$idtk','$gmail','$ten','$ho','$gioitinh','$image','$quyen','$tentk','$pass','$rep')";
          
          $query = $conn->query($sql);
          
          if($query){
            $_SESSION['username']=$tentk;
            $_SESSION['pass']=$password;

            $sql_max_id_thongbao=mysqli_query($conn,"SELECT MAX(`IDTHONGBAO`) AS MAX FROM thongbao");
            $max_id= mysqli_fetch_assoc($sql_max_id_thongbao);
            $idtb= $max_id['MAX'];
            $idtb+=1;
            $tinhtrang="Chưa đọc";
            $loaitt="Đăng ký";

            $noidung="$tentk đã đăng ký với $gmail vào lúc $lastupdate";

            $sql_thongbao="INSERT INTO thongbao VALUES('$idtb','$tinhtrang','$noidung','$tentk','$loaitt')";
            $rs_thongbao=$conn->query($sql_thongbao);
            echo "<script type='text/javascript'> window.location.href='Login.php';</script>";


          }     
          else{
              echo "<script type='text/javascript'>alert('Thêm không thành công'); window.location.href=Register.php';</script>";
          }
      }
    }

?>
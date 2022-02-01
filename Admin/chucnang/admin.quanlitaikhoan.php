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
        <div class="row">
            <a href="#"></a>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                <h4 class="card-title">Quản lí tài khoản</h4>
                  <p class="card-description"> Add class <code>.table-striped</code>
                  </p>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width:5%;"> ID </th>
                        <th  style="width:10%;"> Tài khoản </th>
                        <th style="width:20%;"> Gmail </th>
                        <th style="width:5%;"> Giới tính </th>
                        <th style="width:10%;"> Quyền </th> 
                        <th style="width:15%;"> Câu quên mật khẩu </th>                          
                        <th> Amount </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include '../template/connect.php';
                        $sql = "SELECT * FROM thongtintaikhoan inner join quyentaikhoan on thongtintaikhoan.QUYENTAIKHOAN = quyentaikhoan.IDQUYEN";
                        $query = $conn->query($sql);
                        if($query){
                          while ($row = $query->fetch_assoc()) {
                            echo '<tr>
                              <td>'.$row['IDTAIKHOAN'].'</td>
                              <td> <img class="img-fluid" src="data:image/jpeg;charset=utf8;base64,'.$row['AVATAR'].'" alt="" width="100px"/> '.$row['TENTAIKHOAN'].' </td>
                              <td> '.$row['GMAIL'].' </td>
                              <td> '.$row['GIOITINH'].' </td>
                              <td> '.$row['QUYENTAIKHOAN'].' </td>                                  
                              <td> '.$row['REP'].' </td>
                              <td><a href="admin.thayquyen.php?TENTAIKHOAN='.$row['TENTAIKHOAN'].'">Sửa <br></a> 
                                  <a onclick="ConfirmXoa(\''.$row['TENTAIKHOAN'].'\')">Xóa</a></td>
                              </tr>';
                          }
                        }
                        ?>
                    </tbody>
                    </table>
                </div>
              </div>     
          </div>
                      </div>
        <?php include '../template/footer.php'; ?>
    </div>
    <script>
        $(document).ready(function () {
          $('#dtBasicExample').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });
    </script>
    
        <script>
          function ConfirmXoa(TENTAIKHOAN) {
            var r = confirm("Bạn có thực sự muốn xóa không!");
            if(r==true){
              $.post('../Models/xoataikhoan.php', {'TENTAIKHOAN': TENTAIKHOAN}, function(data, textStatus, xhr) {
                item = data.split('-');
                alert(item[0]);
                location.reload();
              });
            }
          }
          // else{
          //   location.reload();
          // }
        </script>
    
</body>
</html>
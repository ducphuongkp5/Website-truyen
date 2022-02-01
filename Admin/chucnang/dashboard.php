<?php 

    include '../template/connect.php';
    $result_sotruyen= mysqli_query($conn,"SELECT COUNT(`IDTRUYEN`) AS SOLUONG FROM `truyen`");
    $truyen= mysqli_fetch_assoc($result_sotruyen);

    $result_acc= mysqli_query($conn,"SELECT COUNT(`IDTAIKHOAN`) AS SOLUONG FROM thongtintaikhoan");
    $acc= mysqli_fetch_assoc($result_acc);

    $result_view= mysqli_query($conn,"SELECT SUM(`VIEW`) AS VIEW FROM `truyen`");
    $view= mysqli_fetch_assoc($result_view);
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
                </span> Trang chủ
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
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="../assets/images/circle.png" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Tổng số truyện <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= $truyen['SOLUONG'] ?></h2>
                    <h6 class="card-text">Đang tăng</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="../assets/images/circle.png" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Số tài khoản đăng ký<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= $acc['SOLUONG']?></h2>
                    <h6 class="card-text"></h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="../assets/images/circle.png" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Tổng lượt xem <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= $view['VIEW']?></h2>
                    <h6 class="card-text">Tăng</h6>
                  </div>
                </div>
              </div>
            </div>
            <?php 
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, 'select count(IDTRUYEN) as total from truyen');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 6;						
                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);
                
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $result = mysqli_query($conn, "SELECT * FROM truyen  ORDER BY `VIEW` DESC LIMIT $start, $limit");

            ?>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Truyện</h4>
                    <div class="table-responsive">
                      <!-- SHOW TRUYEN -->
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Truyện </th>
                            <th> Lượt xem </th>
                            <th> Tình trạng </th>
                            <th> Last Update </th>
                            <th> Last Chapter </th>
                            <th> Set </th>
                          </tr>
                        </thead>
                        <tbody>
                            <!-- <td>
                              <label class="badge badge-gradient-success">Hoan thanh</label>
                            </td>
                            <td>
                              <label class="badge badge-gradient-warning">Dang tien hanh</label>
                            </td> -->
                        <?php 
                            while($row = mysqli_fetch_assoc($result)){
                                    if($row['TINHTRANG']=='Đang tiến hành') {
                                    $tinhtrang='badge-gradient-warning';
                                    $ten= 'Dang tien hanh';
                                    }
                                    else {
                                        $tinhtrang='badge-gradient-success';
                                        $ten= 'Hoan thanh';
                                    }
                                    echo '
                                    <td>
                                      <img src="data:image/jpeg;charset=utf8;base64,'.$row['ANHDAIDIENTRUYEN'].'" class="mr-2" alt="image">
                                      ' .$row['TENTRUYEN']. '
                                      </td>
                                    <td>'.$row['VIEW'].'</td>
                                    
                                    <td>
                                    <label class="badge '.$tinhtrang.'">'.$ten.'</label>
                                    </td>
                                    <td> '.$row['LastChapter'].' </td>
                                    <td> '.$row['LastUpdate'].' </td>
                                    <td><a href="../chucnang/admin.suathongtintruyen.php?truyen='.$row['IDTRUYEN'].'">Sửa</a><br> 
                                        <a href="../chucnang/admin.addchuong.php">Thêm</a>
                                    </td>
                                    
                                    
                                </tr>' ;
                            }
                        ?>
                        </tbody>
                      </table>
                      <div class="notify">
                                    <ul class="pages">
                                        <?php 
                                            // PHẦN HIỂN THỊ PHÂN TRANG
                                            if ($current_page > 1 && $total_page > 1){
                                                echo '<li><a class="disable" href="index.php?page='.($current_page-1).'"> << </a>   </li>';
                                            }
                                
                                            // Lặp khoảng giữa			
                                            for ($i = 1; $i <= $total_page; $i++){
                                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                                // ngược lại hiển thị thẻ a
                                                
                                                if ($i == $current_page){
                                                    echo '<li class="active"><span>'.$i.'</span></li>';
                                                }
                                                else{
                                                    echo ' <li> <a href="index.php?page='.$i.'">'.$i.'</a> </li> ';
                                                }
                                                
                                            }
                                            // echo ' <li> <span>...</span> </li> ';
                                            
                                            // echo ' <li> <a href="index.php?page='.$total_page.'">'.$total_page.'</a> </li> ';

                                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                            if ($current_page < $total_page && $total_page > 1){
                                                echo '<li><a href="index.php?page='.($current_page+1).'"> >> </a>  </li>';
                                            }
                                        ?>
                                    </ul>           
                                </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Báo cáo vi phạm</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Tài khoản </th>
                            <th> Số lỗi </th>
                            <th> Số lượng</th>
                            <th> Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php include('../Models/baocaovipham.php');?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Spam</h4>
                    <div class="add-items d-flex">
                      <input type="text" class="form-control todo-list-input" placeholder="Thêm nội dung tin nhắn!">
                      <button type="submit" class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" name="add-task" id="add-task">Add</button>
                    </div>

                    <?php 
                      if(isset($_REQUEST['add-task'])){
                        echo'<script>alert("da click");"</script>';
                      }
                    ?>
                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse todo-list todo-list-custom">                        
                          <?php include('../Models/spam.php');  ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
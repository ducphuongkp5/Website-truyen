
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Đang theo dõi</title>
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
    <link rel="stylesheet" href="../style-user.css">
</head>
<body>
        
    <?php 
        include '../pages/header.php';
        
    ?>
    <div class="text" style="padding-left: 100px;padding-top: 30px;">
        <h2 style="font-size: 35px;font-weight: 600;">Cài đặt</h2>
    </div>
    
    <div class="menu-ver-container">
        
        <div class="left">
            <div class="wrap-tab">
                <ul class="nav">
                    <li><a href="theodoi.php">Đang theo dõi</a></li>
                    <li><a href="Caidat.php">Thông tin</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="content-wrap">
                <div class="tab-panel">
                    <table class="list-bookmark">
                        <thead>
                            <tr>
                                <th style="padding-left:10px">Truyện</th>
                                <th>Last Update</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include '../Model/theodoi.php';
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>
<script>
    function ConFirmXoa(idtk,idtruyen){
        var r = confirm("Bạn có thực sự muốn xóa không!");
            if(r==true){
              $.post('botheodoi.php', {'idtk': idtk, 'idtruyen':idtruyen}, function(data, textStatus, xhr) {
                item = data.split('-');
                alert(item[0]);
                location.reload();
              });
            }
    }
</script>

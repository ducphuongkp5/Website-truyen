
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
    <link rel="stylesheet" href="style-user.css">
</head>
<body>
        
    <?php 
    include 'connect.php';
        include 'pages/header.php';
        
    ?>
    
<?php include 'pages/menu.php'; ?>

    
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

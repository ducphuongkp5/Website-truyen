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
        <?php include '../chucnang/dashboard.php'; ?>
        <?php include '../template/footer.php'; ?>
    </div>
    
    
</body>
<?php include('../Models/xoaspam.php');?>
</html>
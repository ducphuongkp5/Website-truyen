<script>
        function xoaspam(IDSPAM){
            var spam= confirm("Bạn có thực sự muốn xóa không!");
            if(spam==true){
                include '../template/connect.php';
                
                    $TENTAIKHOAN = $_REQUEST['IDSPAM'];
                    $sql = "DELETE FROM spam WHERE IDSPAM='$TENTAIKHOAN'";
                    $query = $conn->query($sql);
                    if($query){
                        echo "Đã xóa - ";
                    }
                    else{
                        echo "Không được xóa - ";
                    }
        }       
                            
                
              
    }
    </script>
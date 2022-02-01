<?php

 
// if (($_SERVER['REQUEST_METHOD'] === 'POST') &&
//     (isset($_FILES['fileupload']))) {


//     $truyen= $_POST["inputTruyen"];
//     $chap=  'chap-'.$_POST["inputChap"];


//     if(!mkdir("upload/$truyen/$chap",0700,true)){
//         die ('Faile');
//     }

//     $files = $_FILES['fileupload'];

//         $names      = $files['name'];
//         $types      = $files['type'];
//         $tmp_names  = $files['tmp_name'];
//         $errors     = $files['error'];
//         $sizes      = $files['size'];

//         $luu= '././truyen-tranh/'.$truyen.'/'.$chap;

//         echo $luu;
//         $numitems = count($names);
//         $numfiles = 0;
//         for ($i = 0; $i < $numitems; $i ++) {
//             //Kiểm tra file thứ $i trong mảng file, up thành công không
//             if ($errors[$i] == 0)
//             {
//                 $numfiles++;


//                 move_uploaded_file($tmp_names[$i],$luu.'/'.$names[$i]);


//                 $file_ext = pathinfo( 'C:/xampp/htdocs/WebFun/Truyenne/upload/'.$names[$i] , PATHINFO_EXTENSION);
                
//                 rename($luu.'/'.$names[$i], $luu.'/'.$truyen.'-'.$chap.'-anh-'.$numfiles.'.'.$file_ext);

//                 // echo "Bạn upload file thứ $numfiles:<br>";
//                 // echo "Tên file: $names[$i] <br>";
//                 // echo "Lưu tại: C:/xampp/htdocs/WebFun/Truyenne/upload/ <br>";
//                 // echo "Cỡ file: $sizes[$i] <br><hr>";
                


//                 //Code xử lý di chuyển file đến thư mục cần thiết ở đây (bạn tự thực hiện)
//                 //Ví dụ move_uploaded_file($tmp_names[$i], /upload/'.$names[$i]);
                

//             }
//         }
//         echo "Tổng số file upload: " .$numfiles;
// }

?>

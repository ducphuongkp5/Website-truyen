<?php 

    $result_spam = mysqli_query($conn, "SELECT * FROM `spam`");

    while($row_spam=mysqli_fetch_assoc($result_spam)){
         echo '
            <li>
                <div class="form-check">
                <label class="form-check-label">
                    <input class="checkbox" type="checkbox">'.$row_spam['NOIDUNGSPAM'].' </label>
                </div>
                <i class="remove mdi mdi-close-circle-outline" onclick="xoaspam(\''.$row_spam['IDSPAM'].'\')"></i>
            </li>
        ';


    }


?>
    
    
<?php
     require_once "conn.php";
     if(isset($_GET['docNum'])){
        $docNum = $_GET['docNum'];
        $querry = "UPDATE `vanbandi` set  `trangThai`='Chưa gửi' WHERE 
             `soHieu` = '$docNum' ";
        $result =mysqli_query($connect, $querry);

        $querry2 = "DELETE FROM `vanbannhan`  WHERE 
        `soHieu` = '$docNum' ";
        $result2 =mysqli_query($connect, $querry2);
        
        $baka = array();
        if($result2 && $result ){
           echo "ok";
        }
        else{
            echo $result2 . "  ////" . $querry;
        }
    }
 ?>    
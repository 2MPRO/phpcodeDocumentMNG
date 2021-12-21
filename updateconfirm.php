<?php
     require_once "conn.php";
     if(isset($_GET['docNum'])){
        $docNum = $_GET['docNum'];
        $querry = "UPDATE `vanbannhan` set  `trangThai`='Đã duyệt' WHERE 
            `soHieu` = '$docNum' ";
   
        $result =mysqli_query($connect, $querry);

       
        if($result && $result ){
           echo "ok";
        }
        else{
            echo $result2 . "  ////" . $querry;
        }
    }
 ?>    
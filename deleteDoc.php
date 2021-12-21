<?php
     require_once "conn.php";
     if(isset($_GET['docNum'])){
        $docNum = $_GET['docNum'];

        $querry2 = "DELETE FROM `vanbandi`  WHERE 
        `soHieu` = '$docNum' ";
        $result2 =mysqli_query($connect, $querry2);
        
       
        if($result2 ){
           echo "ok";
        }
        else{
            echo $result2;
        }
    }
 ?>    
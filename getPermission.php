<?php
        require_once "conn.php";
        require_once "validate.php";
        $arrayuser = array();
        $sql = "select * FROM quyen";
	$result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)){
          array_push($arrayuser, new user(
               $row['idQuyen'],
                $row['tenQuyen'],
               
          ));
        
        }
    if(count($arrayuser)>0){
        echo json_encode($arrayuser);
    }
    else{
        echo "failure";
    }
        

    class user{
        function __construct($idQuyen,$tenQuyen) {
            $this->idQuyen = $idQuyen;
            $this->tenQuyen = $tenQuyen;
         
        }
    }
   
?>

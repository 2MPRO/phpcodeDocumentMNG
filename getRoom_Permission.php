<?php
        require_once "conn.php";
        require_once "validate.php";
        $arrayuser = array();
        $sql = "select phanquyen.idPhanQuyen, quyen.idQuyen, quyen.tenQuyen, phongban.idPhongBan FROM quyen , phongban, phanquyen WHERE phongban.idPhongBan = phanquyen.idPhongBan and phanquyen.idQuyen = quyen.idQuyen";
	$result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)){
          array_push($arrayuser, new user(
               $row['idPhanQuyen'],
               $row['idQuyen'],
                $row['tenQuyen'],
                $row['idPhongBan']
          ));
        
        }
    if(count($arrayuser)>0){
        echo json_encode($arrayuser);
    }
    else{
        echo "failure";
    }
        

    class user{
        function __construct($idPhanQuyen,$idQuyen,$tenQuyen,$idRoom) {
            $this->idPhanQuyen = $idPhanQuyen;
            $this->idQuyen = $idQuyen;
            $this->tenQuyen = $tenQuyen;
            $this->idRoom = $idRoom;
        }
    }
   
?>

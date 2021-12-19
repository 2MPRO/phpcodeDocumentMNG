<?php
    require_once "conn.php";
    
    $query = "SELECT * FROM LoaiVanBan";
  
    $data = mysqli_query($connect, $query);
    $arrayRoom = array();
    while ($row = mysqli_fetch_assoc($data)){

        array_push( $arrayRoom,new LoaiVanBan(
            $row['idLVB'],
            $row['tenLoai'],
            ));  
    }
    echo json_encode($arrayRoom);
    
    class LoaiVanBan{
        function __construct($idLVB,$tenLoai) {
            $this->idLVB = $idLVB;
            $this->tenLoai = $tenLoai;
        }
    }
?>


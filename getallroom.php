<?php
    require_once "conn.php";
    $idRoom = $_GET['idRoom'];
    $query = "SELECT * FROM phongban where idPhongban <> '$idRoom'";
  
    $data = mysqli_query($connect, $query);
    $arrayRoom = array();
    while ($row = mysqli_fetch_assoc($data)){

        array_push( $arrayRoom,new Room(
            $row['idphongban'],
            $row['tenPhongBan'],
            ));  
    }
    echo json_encode($arrayRoom);
    
    class Room{
        function __construct($idphongban,$tenPhongBan) {
           
            $this->idphongban = $idphongban;
            $this->tenPhongBan = $tenPhongBan;
            
        }
    }
?>


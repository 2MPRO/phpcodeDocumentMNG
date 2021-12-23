<?php
    require_once "conn.php";
    $query = "SELECT * FROM phongban";
    $data = mysqli_query($connect, $query);
    $arrayRoom = array();
    while ($row = mysqli_fetch_assoc($data)){
        array_push( $arrayRoom,new Room(
            $row['idPhongBan'],
            $row['tenPhongBan'],
            ));  
    }

    echo json_encode($arrayRoom);
    class Room{
        function __construct($idPhongBan,$tenPhongBan) {
            $this->idPhongBan = $idPhongBan;
            $this->tenPhongBan = $tenPhongBan;
        }
    }
?>


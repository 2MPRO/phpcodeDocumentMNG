<?php
    require_once "conn.php";
    
    $query = "SELECT * FROM mucDo";
  
    $data = mysqli_query($connect, $query);
    $arrayRoom = array();
    while ($row = mysqli_fetch_assoc($data)){
        array_push( $arrayRoom,new Level(
            $row['idMucDo'],
            $row['tenMucDo'],
            ));  
    }
    echo json_encode($arrayRoom);
    
    class Level{
        function __construct($idMucDo,$tenMucDo) {
           
            $this->idMucDo = $idMucDo;
            $this->tenMucDo = $tenMucDo;
            
        }
    }
?>


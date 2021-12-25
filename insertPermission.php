<?php
require_once "conn.php";

$querry2 = "DELETE FROM `phanquyen`";
$result2 =mysqli_query($connect, $querry2);

$json = $_POST['json'];
$data = json_decode($json,true);
foreach($data as $value){
    $idPhongBan = $value['idRoom'];
    $idQuyen = $value['IdPermission'];
    $querry = "INSERT INTO `phanquyen` (`idPhongBan`, `idQuyen`) VALUES 
                                        ('$idPhongBan', '$idQuyen');";
    $result = mysqli_query($connect, $querry);
}

if ($result) {
    echo "success";
    }
else echo  $querry;

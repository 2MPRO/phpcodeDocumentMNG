<?php
    require_once "conn.php";
    $btnText = $_GET['btnText'];
    $idVanBan = $_GET['idVb'];

    if($btnText == "Duyệt"){
        $querry = "UPDATE  vanbannhan set trangThai= 'đã duyệt'
                        where  idVBN = '$idVanBan'";
    }
    if($btnText == "Thu hồi"){
        $querry = "UPDATE  vanbandi set trangThai= 'chưa gửi'
                        where  idVBD = '$idVanBan'";
        
        //delete nữa
        $query2 = "DELETE  FROM vanbannhan WHERE idVBN = '$idVanBan'";

    }
    if($btnText == "Gửi"){
        $querry = "UPDATE  vanbandi set trangThai= 'đã gửi'
                        where  idVBD = '$idVanBan'";
    }





    $soDienThoai = $_POST['soDienThoai'];
    $diaChi = $_POST['diaChi'];
    $ngaySinh  = $_POST['ngaySinh'];
    $querry = "UPDATE  users set name ='$name', email ='$email', 
                        soDienThoai ='$soDienThoai', 
                        diaChi ='$diaChi', 
                        ngaySinh = '$ngaySinh' 
                        where id = ".$id;

    $result =mysqli_query($conn, $querry);
    if($result)
    {
        echo "ok";
    }
?>
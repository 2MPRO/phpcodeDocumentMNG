<?php
     require_once "conn.php";
    
    $querryMaxVBD ="SELECT Max(idVBD) as id from vanbandi";
    $result =mysqli_query($connect, $querryMaxVBD);
    $row = mysqli_fetch_assoc($result);
    
    if(isset($_POST["docNum"])){
        $soHieu = $_POST["docNum"];
    }
    else{
        $soHieu = "Doc/".($row['id'] + 1);
    }
    
   
    $idDinhKem = "1";
    $idPhongBan = $_POST['idPhongBan'];
    $idNoiDen = $_POST['idNoiDen'];
    $idLoaiVanBan = $_POST['idLoaiVanBan'];
    $idMucDo = $_POST['idMucDo'];
    $noiDung = $_POST['noiDung'];
    $ngayBanHanh = $_POST['ngayBanHanh'];
    $gioBanHanh = $_POST['gioBanHanh'];
    $tenVanBan = $_POST['tenVanBan'];

    $querry = "INSERT INTO `vanbannhan` (`idVBN`, `idPhongBan`, `idNoiDen`, `idLoaiVanBan`, `idMucDo`, `dinhKem`, `noiDung`, `soHieu`, `ngayBanHanh`, `gioBanHanh`, `trangThai`, `tenVanBan`) VALUES 
                                        (NULL, '$idNoiDen', '$idPhongBan', '$idLoaiVanBan', '$idMucDo', '$idDinhKem', '$noiDung', '$soHieu', '$ngayBanHanh', '$gioBanHanh', 'Chưa duyệt', '$tenVanBan');";    
    $querry2 = "INSERT INTO `vanbandi` (`idVBD`, `idPhongBan`, `idNoiNhan`, `idLoaiVanBan`, `idMucDo`, `dinhKem`, `noiDung`, `soHieu`, `ngayBanHanh`, `gioBanHanh`, `trangThai`, `tenVanBan`) VALUES 
                                        (NULL, '$idPhongBan', '$idNoiDen', '$idLoaiVanBan', '$idMucDo', '$idDinhKem', '$noiDung', '$soHieu', '$ngayBanHanh', '$gioBanHanh', 'Đã gửi', '$tenVanBan');";                   
    //acTion khi bấm vào Gửi từ chổ soạn
    if(isset($_POST['acTion'])) {
        $idVBD = $_POST['acTion'];
        $querry2 = "UPDATE `vanbandi` set `idPhongBan` = '$idPhongBan', `idNoiNhan` = '$idNoiDen' , `idLoaiVanBan` = '$idLoaiVanBan', `idMucDo` = '$idMucDo', `dinhKem` = '$idDinhKem', `noiDung` = '$noiDung',
         `ngayBanHanh`='$ngayBanHanh', `gioBanHanh`='$gioBanHanh', `trangThai`='Đã gửi', `tenVanBan`='$tenVanBan' WHERE 
             `idVBD` = '$idVBD' ";
    }

    //Lưu vào chờ gửi
    if(isset($_POST['saveTmp'])){
        $querry2 = "INSERT INTO `vanbandi` (`idVBD`, `idPhongBan`, `idNoiNhan`, `idLoaiVanBan`, `idMucDo`, `dinhKem`, `noiDung`, `soHieu`, `ngayBanHanh`, `gioBanHanh`, `trangThai`, `tenVanBan`) VALUES 
                                            (NULL, '$idPhongBan', '$idNoiDen', '$idLoaiVanBan', '$idMucDo', '$idDinhKem', '$noiDung', '$soHieu', '$ngayBanHanh', '$gioBanHanh', 'Chưa gửi', '$tenVanBan');";                   
    }
    else{
    $result = mysqli_query($connect, $querry);
    }
    $result2 = mysqli_query($connect, $querry2);
    if($result)
    {
        echo $soHieu;
    }
    else echo  $erro;
?>
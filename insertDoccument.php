<?php
     require_once "conn.php";
    
    $querryMaxVBD ="SELECT Max(idVBD) as id from vanbandi";
    $result =mysqli_query($connect, $querryMaxVBD);
    $row = mysqli_fetch_assoc($result);
    $soHieu = "Doc/".($row['id'] + 1);
    $idDinhKem = "1";
    $idPhongBan = $_POST['idPhongBan'];
    $idNoiDen = $_POST['idNoiDen'];
    $idLoaiVanBan = $_POST['idLoaiVanBan'];
    $idMucDo = $_POST['idMucDo'];
    $noiDung = $_POST['noiDung'];
    $ngayBanHanh = $_POST['ngayBanHanh'];
    $gioBanHanh = $_POST['gioBanHanh'];
  
    $tenVanBan = $_POST['tenVanBan'];

    $querry = "INSERT INTO `vanbannhan` (`idVBN`, `idPhongBan`, `idNoiDen`, `idLoaiVanBan`, `idMucDo`, `idDinhKem`, `noiDung`, `soHieu`, `ngayBanHanh`, `gioBanHanh`, `trangThai`, `tenVanBan`) VALUES 
                                        (NULL, '$idNoiDen', '$idPhongBan', '$idLoaiVanBan', '$idMucDo', '$idDinhKem', '$noiDung', '$soHieu', '$ngayBanHanh', '$gioBanHanh', 'Chưa duyệt', '$tenVanBan');";    
     $querry2 = "INSERT INTO `vanbandi` (`idVBD`, `idPhongBan`, `idNoiNhan`, `idLoaiVanBan`, `idMucDo`, `idDinhKem`, `noiDung`, `soHieu`, `ngayBanHanh`, `gioBanHanh`, `trangThai`, `tenVanBan`) VALUES 
                                        (NULL, '$idPhongBan', '$idNoiDen', '$idLoaiVanBan', '$idMucDo', '$idDinhKem', '$noiDung', '$soHieu', '$ngayBanHanh', '$gioBanHanh', 'Đã gửi', '$tenVanBan');";                   
    $result =mysqli_query($connect, $querry);
    $result =mysqli_query($connect, $querry2);
    if($result)
    {
        echo "success";
    }
    else echo $querry;
?>
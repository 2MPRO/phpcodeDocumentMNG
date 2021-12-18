<?php
    require_once "conn.php";
    $idRoom = $_GET['idRoom'];
    $query = "SELECT * FROM vanbannhan, phongban where trangthai = 'chưa duyệt' and vanbannhan.idPhongBan='$idRoom' and phongban.idphongban= vanbannhan.idnoiden";
    $data = mysqli_query($connect, $query);
    $arrayReceiveApproved = array();
    while ($row = mysqli_fetch_assoc($data)){

        array_push( $arrayReceiveApproved,new Document(
            $row['idVBN'],
            $row['tenVanBan'],
            $row['tenPhongBan'],
            $row['idLoaiVanBan'],
            $row['idDinhKem'],
            $row['noiDung'],
            $row['soHieu'],
            $row['ngayBanHanh'],
            $row['gioBanHanh'],
            $row['trangThai']
            ));  
    }
    echo json_encode($arrayReceiveApproved);
    
    class Document{
        function __construct($idVBN,$tenVB,$tenPhongBan,$idDinhKem,$idLoaiVanBan,$noiDung,$soHieu,$ngayBanHanh, $gioBanHanh,$trangThai) {
           
            $this->idVBN = $idVBN;
            $this->tenVB = $tenVB;
            $this->tenPhongBan = $tenPhongBan;
            $this->idLoaiVanBan = $idLoaiVanBan;
            $this->idDinhKem = $idDinhKem;
            $this->noiDung = $noiDung;
            $this->soHieu = $soHieu;
            $this->ngayBanHanh = $ngayBanHanh;
            $this->gioBanHanh = $gioBanHanh;
            $this->trangThai = $trangThai;
        }
    }
?>


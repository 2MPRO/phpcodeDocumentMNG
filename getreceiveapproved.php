<?php
    require_once "conn.php";
    $idRoom = $_GET['idRoom'];
    // docroot là nơi đến hoạc nơi nhận
    $query1 = "SELECT * FROM phongban where idPhongban  = '$idRoom'";
    $result =  mysqli_query($connect, $query1);
    $rowdocRoot2 = mysqli_fetch_assoc($result);
    $docRoot2 = ($rowdocRoot2['tenPhongBan']);

    $query = "SELECT * FROM dinhKem,loaivanban, mucdo, vanbannhan, phongban where dinhKem.soHieu = vanbannhan.soHieu and trangthai = 'đã duyệt' and vanbannhan.idPhongBan='$idRoom' and phongban.idphongban= vanbannhan.idnoiden and vanbannhan.idLoaiVanBan = loaivanban.idLVB and vanbannhan.idMucDo = mucdo.idMucDo";
    $data = mysqli_query($connect, $query);
    $arrayReceiveApproved = array();
    while ($row = mysqli_fetch_assoc($data)){
        array_push( $arrayReceiveApproved,new Document(
            $row['idVBN'],
            $row['tenVanBan'],
            $row['tenPhongBan'],
            $row['soHieu'],
            $row['ngayBanHanh'],
            $row['gioBanHanh'],
            $row['trangThai'],
            $docRoot2,
            $row['location'],
            $row['tenLoai'],
            $row['tenMucDo'],
            $row['noiDung'],
            ));  
    }
    echo json_encode($arrayReceiveApproved);
    
    class Document{
        function __construct($idVBN,$tenVB,$tenPhongBan,
       $soHieu,$ngayBanHanh, $gioBanHanh,
        $trangThai, $docRoot2, $dinhKem,$loaiVanBan, $mucDo, $noiDung  ) {
           
            $this->idVBN = $idVBN;
            $this->tenVB = $tenVB;
            $this->tenPhongBan = $tenPhongBan;
            $this->soHieu = $soHieu;
            $this->ngayBanHanh = $ngayBanHanh;
            $this->gioBanHanh = $gioBanHanh;
            $this->trangThai = $trangThai;
            $this->docRoot2= $docRoot2;
            $this->dinhKem= $dinhKem;
            $this->loaiVanBan = $loaiVanBan;
            $this->mucDo =$mucDo;
            $this->noiDung = $noiDung;
        }
    }
?>


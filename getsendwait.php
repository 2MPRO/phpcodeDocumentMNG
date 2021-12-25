<?php
    require_once "conn.php";
    require_once "localhost.php";
    $idRoom = $_GET['idRoom'];
    
    // docroot là nơi đến hoạc nơi nhận
    $query1 = "SELECT * FROM phongban where idPhongban  = '$idRoom'";
    $result =  mysqli_query($connect, $query1);
    $rowdocRoot2 = mysqli_fetch_assoc($result);
    $docRoot2 = ($rowdocRoot2['tenPhongBan']);


    $query = "SELECT * FROM vanbandi, phongban , loaivanban, mucdo, dinhkem where dinhkem.sohieu = vanbandi.sohieu and trangthai = 'chưa gửi' and vanbandi.idPhongBan='$idRoom' and phongban.idphongban= vanbandi.idnoinhan 
    and vanbandi.idLoaiVanBan = loaivanban.idLVB and vanbandi.idMucDo = mucdo.idMucDo";
    $data = mysqli_query($connect, $query);
    $arrayReceiveApproved = array();
    while ($row = mysqli_fetch_assoc($data)){
        $pdfLocation = $row["location"];
        $pdfFile = file_get_contents($pdfLocation);
        $dinhKem =  base64_encode($pdfFile);
        array_push( $arrayReceiveApproved,new Document(
            $row['idVBD'],
            $row['tenVanBan'],
            $docRoot2,
            $row['soHieu'],
            $row['ngayBanHanh'],
            $row['gioBanHanh'],
            $row['trangThai'],
            $row['tenPhongBan'],
            $dinhKem,
            $row['tenLoai'],
            $row['tenMucDo'],
            $row['noiDung'],
            ));  
    }
    echo json_encode($arrayReceiveApproved);
    
    class Document{
        function __construct($idVBD,$tenVB,$tenPhongBan,
       $soHieu,$ngayBanHanh, $gioBanHanh,
        $trangThai,$docRoot2, $dinhKem,$loaiVanBan, $mucDo, $noiDung 
        ) {     
            $this->idVBD = $idVBD;
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


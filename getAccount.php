<?php
     include "conn.php";
     $idUser = $_GET['email'];
    class user{
        function __construct($idPhongBan, $hoten, $ngaysinh, $gioitinh, $diachi, $taiKhoan, $matkhau){
            $this->idPhongBan = $idPhongBan;
            $this->hoten = $hoten;
            $this ->ngaysinh = $ngaysinh;
            $this ->gioitinh = $gioitinh;
            $this ->diachi = $diachi;
            $this ->taiKhoan = $taiKhoan;
            $this ->matkhau = $matkhau;
        }
    }
    $userArray = array();
    $query = "SELECT * FROM nguoidung WHERE idPhongBan = '$idPhongBan'";
    $data = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($data)){
        array_push($userArray,new user(
            $row['idPhongBan'],
            $row['hoten'],
            $row['ngaysinh'],
            $row['gioitinh'],
            $row['diachi'],
            $row['taiKhoan'],
            $row['matkhau']
          ));
}
    
    
    echo json_encode($userArray);
?>
<?php
    include_once("conn.php");
    $hoten = $_POST['hoten'] ;
    $ngaysinh = $_POST['ngaysinh'] ;
    $gioitinh =  $_POST['gioitinh'];
    $diachi = $_POST['diachi'] ;
    $matkhau = $_POST['matkhau'] ;
    $taiKhoan = $_POST['taiKhoan'];

    $querry = "UPDATE  nguoidung set 
                                     hoten ='$hoten', 
                                     ngaysinh ='$ngaysinh', 
                                     gioitinh ='$gioitinh', 
                                     diachi ='$diachi', 
                                     matkhau = '$matkhau' 
                                     where taiKhoan = '$taiKhoan' ";

    $result = mysqli_query($connect, $querry);


    $arrayuser = array();
    $sql1 = "select * from nguoidung";
    $result1 = mysqli_query($connect,$sql1);
        while($row = mysqli_fetch_assoc($result1)){
          array_push($arrayuser, new user(
                $row['idNguoiDung'],
                $row['taiKhoan'],
                $row['hoten'],
                $row['matkhau'],
                $row['ngaysinh'],
                $row['gioitinh'],               
                $row['diachi']
          ));
        
        }
    
    
    if(count($arrayuser)>0){
        echo json_encode($arrayuser);
    }
    else{
        echo "failure";
    } 
    class user{
        function __construct($idNguoidung,$taiKhoan,$hoten,$matkhau,$ngaysinh,
            $gioitinh,$diachi) {
            $this->idNguoidung = $idNguoidung;
     
            $this->taiKhoan = $taiKhoan;
            $this->hoten = $hoten;
            $this->matkhau = $matkhau;
 
            $this->ngaysinh = $ngaysinh;      
            $this->gioitinh = $gioitinh;
            $this->diachi = $diachi;
        }
    }      

?>
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
        $sql = "select nguoiDung.*, phongban.tenPhongBan , quyen.idQuyen from phongban, nguoidung , quyen, phanquyen where taiKhoan = '$taiKhoan' and phongban.idPhongBan = nguoidung.idPhongBan and nguoidung.idPhongBan = phanquyen.idPhongBan and phanquyen.idQuyen = quyen.idQuyen";
    $result1 = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result1)){
          array_push($arrayuser, new user(
                $row['idNguoiDung'],
                $row['idQuyen'],
                $row['taiKhoan'],
                $row['hoten'],
                $row['matkhau'],
                $row['idPhongBan'],
                $row['tenPhongBan'],
                $row['ngaysinh'],
                $row['gioitinh'],               
                $row['diachi']
          ));
        
        }
    }
    
    if(count($arrayuser)>0){
        echo json_encode($arrayuser);
    }
    else{
        echo "failure";
    }       

?>
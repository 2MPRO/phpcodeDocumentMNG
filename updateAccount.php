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
    if($result)
    {
        echo "Success";

    }
    else
        echo $querry;
?>
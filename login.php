<?php
    if(isset($_POST['user'])&&isset($_POST['pass'])){
        require_once "conn.php";
        require_once "validate.php";
        $user = validate($_POST['user']);
        $pass = validate($_POST['pass']);
        $arrayuser = array();
        $sql = "select nguoiDung.*, phongban.tenPhongBan , quyen.idQuyen from phongban, nguoidung , quyen, phanquyen where taiKhoan='$user' and matkhau='$pass' and phongban.idPhongBan = nguoidung.idPhongBan and nguoidung.idPhongBan = phanquyen.idPhongBan and phanquyen.idQuyen = quyen.idQuyen";
	$result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)){
          array_push($arrayuser, new user(
                $row['idNguoiDung'],
                $row['taiKhoan'],
                $row['hoten'],
                $row['matkhau'],
                $row['idPhongBan'],
                $row['tenPhongBan'],
                $row['ngaysinh'],
                $row['diachi'],
                $row['ngaysinh'],
                $row['gioitinh']
          ));
        
        }
    }
    
    if(count($arrayuser)>0){
        echo json_encode($arrayuser);
    }
    else{
        echo "failure";
    }
        

    class user{
        function __construct($idNguoidung,$taiKhoan,$hoten,$matkhau,$idPhongBan,$tenPhongBan,$ngaysinh,$gioitinh,$diachi) {
            $this->idNguoidung = $idNguoidung;
            $this->taiKhoan = $taiKhoan;
            $this->hoten = $hoten;
            $this->matkhau = $matkhau;
            $this->idPhongBan = $idPhongBan;  
            $this->tenPhongBan = $tenPhongBan;  
            $this->ngaysinh = $ngaysinh;  
            $this->diachi = $diachi;   
            $this->ngaysinh = $ngaysinh;  
            $this->gioitinh = $gioitinh;
        }
    }
   
?>

<?php
    
        require_once "conn.php";
        require_once "validate.php";
    
        $arrayuser = array();
        $sql = "select * FROM nguoidung, phongban where phongban.idPhongBan = nguoidung.idPhongBan ";
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

    
    if(count($arrayuser)>0){
        echo json_encode($arrayuser);
    }
    else{
        echo "failure";
    }
        

    class user{
        function __construct($idNguoiDung,$taiKhoan,$hoten,$matkhau,$idPhongBan,$tenPhongBan,$ngaysinh,$gioitinh,$diachi) {
            $this->idNguoiDung = $idNguoiDung;
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

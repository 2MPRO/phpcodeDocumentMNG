<?php 
	if(isset($_POST['hoten']) && isset($_POST['ngaysinh']) && isset($_POST['gioitinh']) 
		&& isset($_POST['diachi']) && isset($_POST['taiKhoan']) && isset($_POST['matkhau'])) 
	{
		require_once "conn.php";
		require_once "validate.php";
		// $idNguoiDung = $_POST['idNguoiDung'];
		
		$idPhongBan = validate($_POST['idPhongBan']);
		$hoten = validate($_POST['hoten']) ;
		$ngaysinh = validate($_POST['ngaysinh']) ;
		$gioitinh =  validate($_POST['gioitinh']);
		$diachi = validate($_POST['diachi']) ;
		$taiKhoan = validate($_POST['taiKhoan']) ;
		$matkhau = validate($_POST['matkhau']) ;

		$query = "insert into nguoidung(idPhongBan, hoten, ngaysinh, gioitinh, diachi, taiKhoan, matkhau) 
						values('$idPhongBan', '$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$taiKhoan', '$matkhau') ";
		// $result = mysqli_query($connect, $query);

		if(!$result = mysqli_query($connect, $query))
	    {
	        echo $query;
	    }
	    else echo "success";	
	    // else echo $query;
	}

	

?>
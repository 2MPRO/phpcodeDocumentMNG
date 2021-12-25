<?php
    require_once "conn.php";
  

    $encodePDF =  $_POST['PDF'];
    $soHieu  = $_POST['docNum'];

    $pdfTitle = strtolower(str_replace('/','',$soHieu));
    $pdfLocation = "documents/$pdfTitle.pdf";
    $querry = "INSERT INTO `dinhKem` (`idDinhKem`, `soHieu`, `tenDinhKem`,`location`) VALUES 
                                    (NULL, '$soHieu', '$pdfTitle', '$pdfLocation');"; 
   if(mysqli_query($connect, $querry)){
       file_put_contents($pdfLocation,base64_decode($encodePDF));
        $result["status"] = True;
        $result['remarks'] = "document upload successfully"; 
   }
   else {
    $result["status"] = False;
    $result['remarks'] = "document upload Failed"; 
   }
   mysqli_close($connect);
  // print(json_encode($result));
  echo $querry;
?>


<META http-equiv=Content-Type content="text/html; charset=utf-8">

<?php
  // // The unzip script
  // // See if there's a file parameter in the URL string
  // $file = $_GET['file'];
  // if (isset($file)) {
  //   echo "Đang giải nén " . $file . "<br>";
  //   system('unzip -o ' . $file);
  //   exit;
  // }
  // // create a handler to read the directory contents
  // $handler = opendir(".");
  // echo "Hãy chọn file để giải nén: " . "<br>";
  // // A blank action field posts the form to itself
  // echo '<form method="get">';
  // $found = FALSE; // Used to see if there were any valid files
  // // keep going until all files in directory have been read
  // while ($file = readdir($handler)) {
  //   if (preg_match ("/.zip$/i", $file)) {
  //     echo '<input type="radio" name="file" value=' . $file . '> ' . $file . '<br>';
  //     $found = true;
  //   }
  // }
  // closedir($handler);
  // if ($found == FALSE) echo "Không tìm thấy file nào có đuôi .zip<br>";
  // else echo '<br>Lưu ý: Các file khi giải nén sẽ ghi đè lên file cũ (nếu đã có sẵn).<br>
  // <br><input type="submit" value="Unzip!">';
  // echo "</form>";
?>

<?php
function unzip($location,$new_location){
    if(exec("unzip $location",$arr)){
        mkdir($new_location);
        for($i = 1;$i< count($arr);$i++){
            $file = trim(preg_replace("~inflating: ~","",$arr[$i]));
                    copy($location."/".$file,$new_location."/".$file);
                    unlink($location."/".$file);
            }
        return true;
    }
    return false;
}

// usage of this code
if(unzip('unzip.zip','/')){
    echo 'Successfully unzipped!';
}else{
    echo 'Error while processing your file!';
}
?>
